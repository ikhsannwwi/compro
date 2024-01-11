<?php

namespace App\Http\Controllers\admin;

use App\Models\FreeQoute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeQouteController extends Controller
{
    private static $module = "free_qoute";

    public function index()
    {
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }
        $settings = FreeQoute::get()->toArray();
        
        $settings = array_column($settings, 'value', 'name');

        // Ambil pengaturan dari database dan tampilkan di halaman
        return view('administrator.free_qoute.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // return $request;
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $settings = FreeQoute::get()->toArray();
        $settings = array_column($settings, 'value', 'name');

        
        $data_settings = [];
        $data_settings["title"] = $request->title;
        $data_settings["sub_title"] = $request->sub_title;
        $data_settings["deskripsi"] = $request->deskripsi;

        $logs = []; // Buat array kosong untuk menyimpan log

        foreach ($data_settings as $key => $value) {
            $data = [];

            if (array_key_exists($key, $settings)) {
                $data["value"] = $value;
                $set = FreeQoute::where('name', $key)->first();
                $set->update($data);

                $logs[] = ['---'.$key.'---' => ['Data Sebelumnya' => ['value' => $settings[$key]], 'Data terbaru' => ['value' => $value]]];
            } else {
                $data["name"] = $key;
                $data["value"] = $value;
                $set = FreeQoute::create($data);

                $logs[] = $set;
            }
        }

        //Write log
        createLog(static::$module, __FUNCTION__, 0,$logs);

        return redirect(route('admin.free_qoute'))->with(['success' => 'Data berhasil di update.']);
    }
}
