<?php

namespace App\Http\Controllers\front;

use App\Mail\FreeQouteMail;
use Illuminate\Http\Request;
use App\Models\admin\Contact;
use App\Models\admin\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FreeQouteController extends Controller
{
    public function index(){
        return view('front.free_qoute.index');
    }

    public function sendMessage(Request $request){
        $settings = Setting::get()->toArray();
        $settings = array_column($settings, 'value', 'name');

        // Set a default value if 'general_nama_app' key is not present
        $generalNamaApp = isset($settings['general_nama_app']) ? $settings['general_nama_app'] : 'Compro';

        $mailData = [
            'title' => '['. ($generalNamaApp ? $generalNamaApp : 'Compro') .'] Pesan baru dari '. $request->email,
            'nama' => $request->nama,
            'email' => $request->email,
            'service' => $request->service,
            'message' => $request->message,
        ];

        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');

        $recipientEmail = isset($contact['email']) ? $contact['email'] : 'ikhsannawawi99@gmail.com';

        try {
            Mail::to($recipientEmail)->send(new FreeQouteMail($mailData));
    
            return response()->json([
                'status' => 'success',
                'message' => 'Pesan berhasil dikirim',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'System error : ' . $th->getMessage(),
            ], 500);
        }
    }
}
