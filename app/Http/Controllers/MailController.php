<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $text = $request->message;

        Mail::to('saymonsagaz1111@gmail.com')->send(new MailClass($name, $phone, $email, $text));
    }
}
