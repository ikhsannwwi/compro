<?php

namespace App\Http\Controllers\admin;

use File;
use Illuminate\Http\Request;
use App\Models\admin\Service;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    private static $module = "service";

    public function edit(){
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }
        $service = Service::get()->toArray();
        
        $service = array_column($service, 'value', 'name');

        // Ambil pengaturan dari database dan tampilkan di halaman
        return view('administrator.service.index', compact('service'));
    }
    
    public function update(Request $request)
    {
        // dd($request);
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $service = Service::get()->toArray();
        $service = array_column($service, 'value', 'name');

        // dd($request);
        
        $data_service = [];
        $data_service["title"] = $request->title;
        for ($i = 0; $i < 5; $i++) {
            $icon = $request->input('icon_' . $i);
            $title = $request->input('title_' . $i);
            $body = $request->input('body_' . $i);

            $data_service['service_'.$i] = json_encode(['title' => $title, 'body' => $body, 'icon' => $icon]);
        }

        $logs = []; // Buat array kosong untuk menyimpan log

        foreach ($data_service as $key => $value) {
            $data = [];

            if (array_key_exists($key, $service)) {
                $data["value"] = $value;
                $set = Service::where('name', $key)->first();
                $set->update($data);

                $logs[] = ['---'.$key.'---' => ['Data Sebelumnya' => ['value' => $service[$key]], 'Data terbaru' => ['value' => $value]]];
            } else {
                $data["name"] = $key;
                $data["value"] = $value;
                $set = Service::create($data);

                $logs[] = $set;
            }
        }

        

        // Setelah perulangan selesai, $logs akan berisi semua log untuk setiap data yang diproses.


        //Write log
        createLog(static::$module, __FUNCTION__, 0,$logs);

        return redirect(route('admin.service'))->with(['success' => 'Data berhasil di update.']);

    }
}
