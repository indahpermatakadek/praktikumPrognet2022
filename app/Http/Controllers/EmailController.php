<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Mail\Reset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public static function email($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        
        Mail::to($email)->send(new Email($data));
    }

    public static function reset($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        
        Mail::to($email)->send(new Reset($data));
    }
}
