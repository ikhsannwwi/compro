<?php

namespace App\Http\Controllers\admin;

use DB;
use File;
use DataTables;
use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TeamSosialMedia;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    private static $module = "team";

    public function index(){
        //Check permission
        if (!isAllowed(static::$module, "view")) {
            abort(403);
        }

        return view('administrator.team.index');
    }
    
    public function getData(Request $request){
        $data = Team::query();

        $data = $data->get();

        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = "";
                if (isAllowed(static::$module, "delete")) : //Check permission
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete  ">
                    Delete
                </a>';
                endif;
                if (isAllowed(static::$module, "edit")) : //Check permission
                    $btn .= '<a href="'.route('admin.team.edit',$row->id).'" class="btn btn-primary btn-sm mx-3 ">
                    Edit
                </a>';
                endif;
                if (isAllowed(static::$module, "detail")) : //Check permission
                    $btn .= '<a href="'.route('admin.team.detail',$row->id).'" data-id="' . $row->id . '" class="btn btn-secondary btn-sm ">
                    Detail
                </a>';
                endif;
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function add(){
        //Check permission
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        return view('administrator.team.add');
    }
    
    public function save(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        $rules = [
            'nama' => 'required',
            'jabatan' => 'required',
        ];

        $request->validate($rules);

        try {
            DB::beginTransaction();
            $data = Team::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'img_url' => '-',
                'created_by' => auth()->user()->id,
            ]);
            if ($request->hasFile('img')) {
                $fileName = 'image_' . Str::slug($data->nama) . '_' . date('Y-m-d-H-i-s') . '_' . uniqid(2) . '.' . $request->img->getClientOriginalExtension();
                $path = upload_path('team') . $fileName;
                Image::make($request->img->getRealPath())->save($path, 100);
                
                $data->img_url = $fileName;
                $data->update();
            }
            
            if (!empty($request->sosmed)) {
                foreach ($request->sosmed as $row) {
                    $sosmed = TeamSosialMedia::create([
                        'team_id' => $data->id,
                        'nama' => $row['nama'],
                        'url' => $row['url'],
                        'created_by' => auth()->user()->id,
                    ]);
                }
            }
            
            // Log the data
            createLog(static::$module, __FUNCTION__, $data->id, ['Data yang disimpan' => $data]);
            
            DB::commit();
            return redirect()->route('admin.team')->with('success', 'Data berhasil disimpan.');
        } catch (\Throwable $th) {
            DB::rollback();
            $image_path = "./administrator/assets/media/team/" . $fileName;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            return back()->with('error', 'Data gagal disimpan.');
        }
    }
    
    public function edit($id){
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $data = Team::with('sosial_media')->find($id);

        return view('administrator.team.edit',compact('data'));
    }
    
    public function update(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $id = $request->id;
        $data = Team::find($id);

        $rules = [
            'nama' => 'required',
        ];

        $request->validate($rules);

        // Simpan data sebelum diupdate
        $previousData = $data->toArray();

        $updates = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'img_url' => '-',
            'updated_by' => auth()->user()->id,
        ];

        if ($request->hasFile('img')) {
            $image_path = "./administrator/assets/media/team/" . $data->img_url;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = 'image_' . Str::slug($data->nama) . '_' . date('Y-m-d-H-i-s') . '_' . uniqid(2) . '.' . $request->img->getClientOriginalExtension();
            $path = upload_path('team') . $fileName;
            Image::make($request->img->getRealPath())->save($path, 100);

            $updates['img_url'] = $fileName;
        }else{
            $updates['img_url'] = $data->img_url;
        }

        if (!empty($request->sosmed)) {
            foreach ($request->sosmed as $row) {
                if (!empty($row['id'])) {
                    $sosmed = TeamSosialMedia::find($row['id'])->update([
                        'team_id' => $data->id,
                        'nama' => $row['nama'],
                        'url' => $row['url'],
                        'updated_by' => auth()->user()->id,
                    ]);
                } else {
                    $sosmed = TeamSosialMedia::create([
                        'team_id' => $data->id,
                        'nama' => $row['nama'],
                        'url' => $row['url'],
                        'created_by' => auth()->user()->id,
                    ]);
                }
            }
        }

        // Filter only the updated data
        $updatedData = array_intersect_key($updates, $data->getOriginal());

        $data->update($updates);

        createLog(static::$module, __FUNCTION__, $data->id, ['Data sebelum diupdate' => $previousData, 'Data sesudah diupdate' => $updatedData]);
        return redirect()->route('admin.team')->with('success', 'Data berhasil diupdate.');
    }
    
    public function delete(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "delete")) {
            abort(403);
        }

        $id = $request->id;

        // Find the data based on the provided ID or throw a 404 exception.
        $data = Team::with('sosial_media')->findOrFail($id);

        // Store the data to be logged before deletion
        $deletedData = $data->toArray();

        $image_path = "./administrator/assets/media/team/" . $data->img_url;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

        // Delete the data.
        foreach ($data->sosial_media as $row) {
            $row->delete();
        }
        $data->delete();

        // Write logs for soft delete
        createLog(static::$module, __FUNCTION__, $id, ['Data yang dihapus' => $deletedData]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah dihapus.',
        ]);
    }

    public function deleteSosmed(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $id = $request->id;

        // Find the data based on the provided ID or throw a 404 exception.
        $data = TeamSosialMedia::findOrFail($id);

        // Store the data to be logged before deletion
        $deletedData = $data->toArray();

        $data->delete();

        // Write logs for soft delete
        createLog(static::$module, __FUNCTION__, $id, ['Data yang dihapus' => $deletedData]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah dihapus.',
        ]);
    }

    public function detail($id){
        //Check permission
        if (!isAllowed(static::$module, "detail")) {
            abort(403);
        }

        $data = Team::with('sosial_media')->find($id);

        
        return view('administrator.team.detail',compact('data'));
    }
}
