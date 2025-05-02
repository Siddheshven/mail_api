<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request){
        $request->validate([
            'to' => 'required|email',
            'subject' =>'required|string',
            'message' => 'required|string',
        ]);

        Mail::to($request->to)->send(new MyMail(
            $request -> subject,
            $request -> message,
        ));

        return response()->json(['message' => 'email sent successfully!']);
    }
}
