<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
    public function doLogin(Request $req){
        $req->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);

        $check = $req->only('email','password');

        // Success
        if(Auth::guard('admin')->attempt($check)){
            $req->session()->regenerate();

            return redirect()->intended('/admin/home');
        }

        // Fail
        return redirect()->route('admin.login')->with('fail', 'Email atau Password tidak sesuai!');
    }

    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
