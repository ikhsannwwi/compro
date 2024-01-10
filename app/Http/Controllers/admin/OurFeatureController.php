<?php

namespace App\Http\Controllers\admin;

use App\Models\OurFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurFeatureController extends Controller
{
    private static $module = "our_feature";

    public function edit(){
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }
        $our_feature = OurFeature::get()->toArray();
        
        $our_feature = array_column($our_feature, 'value', 'name');

        // Ambil pengaturan dari database dan tampilkan di halaman
        return view('administrator.our_feature.index', compact('our_feature'));
    }
    
    public function update(Request $request)
    {
        // dd($request);
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $our_feature = OurFeature::get()->toArray();
        $our_feature = array_column($our_feature, 'value', 'name');

        // dd($request);
        
        $data_our_feature = [];
        $data_our_feature["sub_title"] = $request->sub_title;
        $data_our_feature["title"] = $request->title;
        $data_our_feature["image"] = $request->image;
        for ($i = 0; $i < 5; $i++) {
            $icon = $request->input('icon_' . $i);
            $title = $request->input('title_' . $i);
            $body = $request->input('body_' . $i);
        
            $data_our_feature['our_feature_'.$i] = json_encode(['title' => $title, 'body' => $body, 'icon' => $icon]);
        }

        $logs = []; // Buat array kosong untuk menyimpan log

        foreach ($data_our_feature as $key => $value) {
            $data = [];

            if (array_key_exists($key, $our_feature)) {
                $data["value"] = $value;
                $set = OurFeature::where('name', $key)->first();
                $set->update($data);

                $logs[] = ['---'.$key.'---' => ['Data Sebelumnya' => ['value' => $our_feature[$key]], 'Data terbaru' => ['value' => $value]]];
            } else {
                $data["name"] = $key;
                $data["value"] = $value;
                $set = OurFeature::create($data);

                $logs[] = $set;
            }
        }

        

        // Setelah perulangan selesai, $logs akan berisi semua log untuk setiap data yang diproses.


        //Write log
        createLog(static::$module, __FUNCTION__, 0,$logs);

        return redirect(route('admin.our_feature'))->with(['success' => 'Data berhasil di update.']);

    }
}
