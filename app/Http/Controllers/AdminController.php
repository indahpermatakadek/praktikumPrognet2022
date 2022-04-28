<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admins.login.login1');
    }

    public function login(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admins.dashboard');
        }

        return back()->withErrors([
            'username' => 'Use the right admin username!',
        ]);
    }
  
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admins.login');
    }

    public function dashboard()
    {
        return view('pages.admins.dashboard.index');
    }
}
