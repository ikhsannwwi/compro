<?php

namespace App\Http\Controllers\front;

use Throwable;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\admin\Contact;
use App\Models\admin\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('front.contact.index');
    }

    public function sendMessage(Request $request){
        $settings = Setting::get()->toArray();
        $settings = array_column($settings, 'value', 'name');

        $mailData = [
            'title' => '['. $settings['general_nama_app'] .'] Pesan baru dari '. $request->email,
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        $contact = Contact::get()->toArray();
        $contact = array_column($contact, 'value', 'name');

        $recipientEmail = $contact['email'];

        try {
            Mail::to($recipientEmail)->send(new ContactMail($mailData));
    
            return response()->json([
                'status' => 'success',
                'message' => 'Pesan berhasil dikirim',
            ], 200);
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'System error : ' . $th->getMessage(),
            ], 500);
        }
    }
}
