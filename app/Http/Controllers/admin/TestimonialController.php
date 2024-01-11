<?php

namespace App\Http\Controllers\admin;

use DB;
use File;
use DataTables;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    private static $module = "testimonial";

    public function index(){
        //Check permission
        if (!isAllowed(static::$module, "view")) {
            abort(403);
        }

        return view('administrator.testimonial.index');
    }
    
    public function getData(Request $request){
        $data = Testimonial::query();

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
                    $btn .= '<a href="'.route('admin.testimonial.edit',$row->id).'" class="btn btn-primary btn-sm mx-3 ">
                    Edit
                </a>';
                endif;
                if (isAllowed(static::$module, "detail")) : //Check permission
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#detailTestimonial">
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

        return view('administrator.testimonial.add');
    }
    
    public function save(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        $rules = [
            'nama' => 'required',
            'keterangan' => 'required',
        ];

        $request->validate($rules);
        $fileName = '';
        try {
            DB::beginTransaction();
            $data = Testimonial::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'created_by' => auth()->user()->id,
            ]);
            if ($request->hasFile('img')) {
                $fileName .= 'image_' . Str::slug($data->nama) . '_' . date('Y-m-d-H-i-s') . '_' . uniqid(2) . '.' . $request->img->getClientOriginalExtension();
                $path = upload_path('testimonial') . $fileName;
                Image::make($request->img->getRealPath())->save($path, 100);
                
                $data->img_url = $fileName;
                $data->update();
            }
            
            // Log the data
            createLog(static::$module, __FUNCTION__, $data->id, ['Data yang disimpan' => $data]);
            
            DB::commit();
            return redirect()->route('admin.testimonial')->with('success', 'Data berhasil disimpan.');
        } catch (\Throwable $th) {
            DB::rollback();
            $image_path = "./administrator/assets/media/testimonial/" . $fileName;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            return back()->with('error', $th->getMessage());
        }
    }
    
    public function edit($id){
        //Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $data = Testimonial::find($id);

        return view('administrator.testimonial.edit',compact('data'));
    }
    
    public function update(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $id = $request->id;
        $data = Testimonial::find($id);

        $rules = [
            'nama' => 'required',
            'keterangan' => 'required',
        ];

        $request->validate($rules);

        // Simpan data sebelum diupdate
        $previousData = $data->toArray();

        $updates = [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'updated_at' => auth()->user()->id,
        ];

        if ($request->hasFile('img')) {
            $image_path = "./administrator/assets/media/testimonial/" . $data->img_url;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = 'image_' . Str::slug($data->nama) . '_' . date('Y-m-d-H-i-s') . '_' . uniqid(2) . '.' . $request->img->getClientOriginalExtension();
            $path = upload_path('testimonial') . $fileName;
            Image::make($request->img->getRealPath())->save($path, 100);

            $updates['img_url'] = $fileName;
        }else{
            $updates['img_url'] = $data->img_url;
        }

        // Filter only the updated data
        $updatedData = array_intersect_key($updates, $data->getOriginal());

        $data->update($updates);

        createLog(static::$module, __FUNCTION__, $data->id, ['Data sebelum diupdate' => $previousData, 'Data sesudah diupdate' => $updatedData]);
        return redirect()->route('admin.testimonial')->with('success', 'Data berhasil diupdate.');
    }
    
    public function delete(Request $request)
    {
        // Check permission
        if (!isAllowed(static::$module, "delete")) {
            abort(403);
        }

        $id = $request->id;

        // Find the data based on the provided ID or throw a 404 exception.
        $data = Testimonial::findOrFail($id);

        // Store the data to be logged before deletion
        $deletedData = $data->toArray();

        $image_path = "./administrator/assets/media/testimonial/" . $data->img_url;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

        $data->delete();

        // Write logs for soft delete
        createLog(static::$module, __FUNCTION__, $id, ['Data yang dihapus' => $deletedData]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data telah dihapus.',
        ]);
    }

    public function getDetail($id){
        //Check permission
        if (!isAllowed(static::$module, "detail")) {
            abort(403);
        }

        $data = Testimonial::find($id);

        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => 'Sukses memuat detail user.',
        ]);
    }
}
