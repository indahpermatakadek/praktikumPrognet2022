<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\EmailController;
use Hash;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function create(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->profile_image = 'Foto';
        $user->verification_code = sha1(time());
        $data = $user->save();

        // Success
        if($data){
            EmailController::email($user->name, $user->email, $user->verification_code);
            return redirect()->route('user.login')->with('success', 'Berhasil Mendaftar! Silahkan cek email untuk verifikasi');
            // return redirect()->route('user.email')->with('success', 'Berhasil Mendaftar! Silahkan cek email untuk verifikasi');
        }
        
        // Fail
        return redirect()->route('user.login')->with('fail', 'Gagal Mendaftar!');
        
    }

    public function verify(){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $user = User::where(['verification_code' => $verification_code])->first();

        if($user){
            $user->email_verified_at = new Carbon();
            $user->save();
            return redirect()->route('user.login')->with('success', 'Akun Anda telah diverifikasi! Silahkan masuk');
        }

        return redirect()->route('user.login')->with('fail', 'Kode verifikasi tidak valid!');
    }

    public function doLogin(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!$user = User::where(['email' => $req->email])->first()){
            return redirect()->route('user.login')->with('fail', 'Email belum terdaftar!');
        }

        $eva = $user->email_verified_at;

        if($eva == null){
            return redirect()->route('user.login')->with('fail', 'Email anda belum terverifikasi!');
        }

        $check = $req->only('email','password');

        // Success
        if(Auth::guard('web')->attempt($check)){
            $req->session()->regenerate();

            return redirect()->intended('/user/home');
        }

        // Fail
        return redirect()->route('user.login')->with('fail', 'Email atau Password tidak sesuai!');

    }

    public function logout(Request $req){
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect()->route('user.homepage');
    }

    public function request_reset(Request $req){
        $req->validate([
            'email' => 'required|email',
        ]);

        if(!$user = User::where(['email' => $req->email])->first()){
            return redirect()->route('user.forgot-password')->with('fail', 'Email belum terdaftar!');
        }

        $eva = $user->email_verified_at;

        if($eva == null){
            return redirect()->route('user.forgot-password')->with('fail', 'Silahkan verifikasi akun Anda terlebih dahulu!');
        }

        $user->verification_code = sha1(time());
        $data = $user->save();

        EmailController::reset($user->name, $user->email, $user->verification_code);
        return redirect()->route('user.forgot-password')->with('success', 'Silahkan cek email untuk reset password Anda');
    }

    public function verify_reset(){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $user = User::where(['verification_code' => $verification_code])->first();

        if($user){
            $email = $user->email;
            return view('dashboard.user.change-password', ['email'=>$email]);
        }

        return redirect()->route('user.forgot-password')->with('fail', 'Kode verifikasi tidak valid!');
    }

    public function save_reset(Request $req){
        $req->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = User::where(['email' => $req->email])->first();

        if($user){
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->route('user.login')->with('success', 'Berhasil melakukan reset password!');
        }

        return redirect()->route('user.login')->with('fail', 'Terjadi Kesalahan!');

    }
}
