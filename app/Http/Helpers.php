<?php

use Jenssegers\Agent\Agent;
use App\Models\admin\User;
use App\Models\admin\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\UserGroup;
use App\Models\admin\ModuleAccess;
use Illuminate\Support\Facades\DB;

function asset_administrator($url)
{
	return asset('administrator/' . $url);
}

function template_stisla($url)
{
	return asset('templateStisla/dist/assets/' . $url);
}

function template_startup($url)
{
	return asset('templateStartup/' . $url);
}

function template_frontpage($url)
{
	return asset('templateFrontpage/' . $url);
}

function asset_frontpage($url)
{
	return asset('frontpage/' . $url);
}

function upload_path($type = '', $file = '')
{
	switch ($type) {
		case 'settings':
			$target_folder = 'settings';
			break;
		case 'profile':
			$target_folder = 'profile';
			break;
		case 'project':
			$target_folder = 'project';
			break;
		case 'service':
			$target_folder = 'service';
			break;
		case 'blog':
			$target_folder = 'blog';
			break;
		case 'gallery':
			$target_folder = 'gallery';
			break;
		case 'client':
			$target_folder = 'client';
			break;
		case 'banner':
			$target_folder = 'banner';
			break;
		case 'default':
			$target_folder = 'default';
			break;
		case 'team':
			$target_folder = 'team';
			break;
		case 'testimonial':
			$target_folder = 'testimonial';
			break;
		default:
			$target_folder = '';
			break;
	}

	return Str::finish('administrator/assets/media/' . $target_folder, '/') . $file;
}

function img_src($image = '', $img_type = '')
{
	$file_notfound = 'media/notfound.jpg';

	if (filter_var($image, FILTER_VALIDATE_URL)) {
		return $image;
	} else {
		switch ($img_type) {
			case 'settings':
				$folder = '/settings/';
				break;
			case 'profile':
				$folder = '/profile/';
				break;
			case 'project':
				$folder = '/project/';
				break;
			case 'service':
				$folder = '/service/';
				break;
			case 'blog':
				$folder = '/blog/';
				break;
			case 'gallery':
				$folder = '/gallery/';
				break;
			case 'client':
				$folder = '/client/';
				break;
			case 'banner':
				$folder = '/banner/';
				break;
			case 'default':
				$folder = '/default/';
				break;
			case 'team':
				$folder = '/team/';
			case 'testimonial':
				$folder = '/testimonial/';
				break;
			default:
				$folder = '/';
				break;
		}
		$file = 'administrator/assets/media' . $folder . $image;
		//echo $file;
		if ($image === true) {
			return url('media' . $folder);
		} else if (file_exists($file) && !is_dir($file)) {
			return url($file);
		} elseif (file_exists($file_notfound)) {
			return url($file_notfound);
		} else {
			return 'http://placehold.it/500x500?text=Not Found';
		}
	}
}

function createLog($module, $action, $data_id,$data)
{
    $log['ip_address'] = request()->ip();
    $log['user_id'] = auth()->check() ? auth()->user()->id : 1;	

    // Use Jenssegers/Agent to get device and browser information
    $agent = new Agent();
    $log['device'] = $agent->device();
    $log['browser_name'] = $agent->browser();
    $log['browser_version'] = $agent->version($log['browser_name']); // Add browser version

    $log['module'] = $module;
    $log['action'] = $action;
    $log['data_id'] = $data_id;
    $log['data'] = json_encode($data);;
    $log['created_at'] = now(); // Use Carbon for date and time

    Log::create($log);
}

function isAllowed($modul, $modul_akses)
{
	if (!auth()->user()) {
		return false;
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->user_group_id;
	$permission = getPermissionGroup($grup_pengguna_id);
	if ($grup_pengguna_id == 0) {
		return TRUE;
	} else {
		$group = UserGroup::find($grup_pengguna_id);
        
        if ($group->status == 1) {
            $permission = getPermissionGroup($grup_pengguna_id);
            
            if ($permission[$grup_pengguna_id][$modul][$modul_akses] == 1) {
                return true; // Jika user group aktif dan memiliki izin, berikan akses
            }
        }
    }
    return false; // Default, jika tidak memenuhi syarat maka tidak diizinkan akses
	
}

function getDefaultPermission()
{
	$query = ModuleAccess::select(DB::raw("
    module_access.*,
    user_group_permissions.user_group_id,
    user_group_permissions.status"))
		->leftJoin(
			DB::raw("user_group_permissions"),
			function ($join) {
				$join->on('user_group_permissions.module_access_id', '=', 'module_access.id');
			}
		);
	$data_akses = $query->get();
	$data_grup_pengguna = UserGroup::all();
	$permission = array();
	foreach ($data_grup_pengguna as $val) {
		foreach ($data_akses as $row) {
			$permission[$val->id][$row->module_id][$row->id] = 0;
		}
	}
	return $permission;
}

function getPermissionGroup($user_group_id)
{
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifiers as module_identifiers,
    module_access.*,
    user_group_permissions.user_group_id,
    user_group_permissions.status'))
		->leftJoin(
			DB::raw("user_group_permissions"),
			function ($join) use ($user_group_id) {
				$join->on('user_group_permissions.module_access_id', '=', 'module_access.id')
                ->where("user_group_permissions.user_group_id", "=", $user_group_id);
			}
		)
		->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
		->get();
	$permission = [];
	$index = 0;

	foreach ($data_akses as $row) {
		if ($row->status == "") {
			$status = 0;
		} else {
			$status = $row->status;
		}
		$permission[$user_group_id][$row->module_identifiers][$row->identifiers] = $status;
	}
	$index++;

	return $permission;
}

function getPermissionGroup2($x)
{
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifiers as module_identifiers,
    module_access.*,
    user_group_permissions.user_group_id,
    user_group_permissions.status'))
		->leftJoin(
			DB::raw("user_group_permissions"),
			function ($join) use ($x) {
				$join->on('user_group_permissions.module_access_id', '=', 'module_access.id')
                ->where("user_group_permissions.user_group_id", "=", $x);
			}
		)
		->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
		->get();
        // dd($x);
	$permission = [];
	$index = 0;
	foreach ($data_akses as $row) {
		if ($row->status == "") {
			$status = 0;
		} else {
			$status = $row->status;
		}
		$permission[$x][$row->module_identifiers][$row->identifiers] = $status;
	}
	$index++;
	return $permission;
}

function getPermissionModuleGroup()
{
	if (!auth()->user()) {
		return $permission = [];
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->user_group_id;
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifiers as module_identifiers, 
    COUNT(user_group_permissions.id) as permission_given'))
    ->leftJoin(
        DB::raw("user_group_permissions"),
        function ($join) use ($grup_pengguna_id) {
            $join->on('user_group_permissions.module_access_id', '=', 'module_access.id')
                ->where("user_group_permissions.user_group_id", "=", $grup_pengguna_id)
                ->where("user_group_permissions.status", 1);
        }
    )
    ->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
    ->groupBy("module.id", "module.identifiers")
    ->get();

	$permission = [];
	$index = 0;

	foreach ($data_akses as $row) {
		if ($row->permission_given > 0) {
			$status = TRUE;
		} else {
			$status = FALSE;
		}
		$permission[$row->module_identifiers] = $status;
	}
	$index++;

	return $permission;
}

function showModule($module, $permission_module)
{
	if (!auth()->user()) {
		return false;
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->user_group_id;
	if ($grup_pengguna_id == 0) {
		return TRUE;
	} else {
		if (array_key_exists($module, $permission_module)) {
			return $permission_module[$module];
		} else {
			return FALSE;
		}
	}
}
