<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function create(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        // Buat Admin baru
        $admin = new Admin();
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = Hash::make($req->password);
        $admin->profile_image = 'Foto';
        $admin->phone = $req->phone;
        $admin->verification_code = sha1(time());
        $data = $admin->save();

        // Success
        if($data){
            EmailController::admin_email($admin->name, $admin->email, $admin->verification_code);
            return redirect()->route('admin.login')->with('success', 'Berhasil Mendaftar! Silahkan cek email untuk verifikasi');
        }
        
        // Fail
        return redirect()->route('admin.login')->with('fail', 'Gagal Mendaftar!');
        
    }

    public function verify(){
        // Mengambil kode verifikasi lewat route
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $admin = Admin::where(['verification_code' => $verification_code])->first();

        // Verifikasi Akun
        if($admin){
            $admin->email_verified_at = new Carbon();
            $admin->save();
            return redirect()->route('admin.login')->with('success', 'Akun Anda telah diverifikasi! Silahkan masuk');
        }

        // Gagal Verifikasi
        return redirect()->route('admin.login')->with('fail', 'Kode verifikasi tidak valid!');
    }

    public function doLogin(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!$admin = Admin::where(['email' => $req->email])->first()){
            return redirect()->route('admin.login')->with('fail', 'Email belum terdaftar!');
        }

        $eva = $admin->email_verified_at;

        if($eva == null){
            return redirect()->route('admin.login')->with('fail', 'Email belum terverifikasi!');
        }

        $check = $req->only('email','password');

        // Set Remember Cookie jika user mencentang box
        $remember = $req->has('remember') ? true : false;

        // Success
        if(Auth::guard('admin')->attempt($check,$remember)){
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

    public function request_reset(Request $req){
        $req->validate([
            'email' => 'required|email',
        ]);

        // Email belum terdaftar
        if(!$admin = Admin::where(['email' => $req->email])->first()){
            return redirect()->route('admin.forgot-password')->with('fail', 'Email belum terdaftar!');
        }

        $eva = $admin->email_verified_at;

        // Email belum terverifikasi
        if($eva == null){
            return redirect()->route('admin.forgot-password')->with('fail', 'Silahkan verifikasi akun Anda terlebih dahulu!');
        }

        // Buat kode verifikasi
        $admin->verification_code = sha1(time());
        $data = $admin->save();

        // Kirim email
        EmailController::admin_reset($admin->name, $admin->email, $admin->verification_code);
        return redirect()->route('admin.forgot-password')->with('success', 'Silahkan cek email untuk reset password Anda');
    }

    public function verify_reset(){
        // Mengambil kode verifikasi lewat route
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $admin = Admin::where(['verification_code' => $verification_code])->first();

        // Ganti Password
        if($admin){
            $email = $admin->email;
            return view('landingpage.admin.change-password', ['email'=>$email]);
        }

        // Gagal ganti Password
        return redirect()->route('admin.forgot-password')->with('fail', 'Kode verifikasi tidak valid!');
    }

    public function save_reset(Request $req){
        $req->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $admin = Admin::where(['email' => $req->email])->first();

        // Save Password baru
        if($admin){
            $admin->password = Hash::make($req->password);
            $admin->save();
            return redirect()->route('admin.login')->with('success', 'Berhasil melakukan reset password!');
        }

        // Gagal save Password
        return redirect()->route('admin.login')->with('fail', 'Terjadi Kesalahan!');
    }
}
