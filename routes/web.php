<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('user.homepage');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::prefix('user')->name('user.')->group(function(){
    
    Route::view('/homepage','dashboard.user.homepage')      ->name('homepage');
    Route::view('/collections','dashboard.user.collections')->name('collections');
    Route::view('/about','dashboard.user.about')            ->name('about');
    
    // Sebelum Login
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login',   'dashboard.user.login')                        ->name('login');
        Route::view('/register','dashboard.user.register')                     ->name('register');
        Route::post('/create',  [UserController::class, 'create'])             ->name('create');
        Route::get('/email',    [EmailController::class, 'email'])             ->name('email');
        Route::get('/verify',   [UserController::class, 'verify'])             ->name('verify');
        Route::post('/doLogin', [UserController::class, 'doLogin'])            ->name('doLogin');
        Route::view('/forgot-password','dashboard.user.forgot-password')       ->name('forgot-password');
        Route::post('/request-reset', [UserController::class, 'request_reset'])->name('request-reset');
        Route::get('/reset', [EmailController::class, 'reset'])                ->name('reset');
        Route::get('/verify-reset', [UserController::class, 'verify_reset'])   ->name('verify-reset');
        Route::post('/save-reset',  [UserController::class, 'save_reset'])     ->name('save-reset');
    });
    
    // Setelah Login
    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','dashboard.user.home')               ->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });

});

// Admin
Route::prefix('admin')->name('admin.')->group(function(){
    
    // Sebelum Login
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','dashboard.admin.login')                           ->name('login');
        Route::view('/register','dashboard.admin.register')                     ->name('register');
        Route::post('/create',  [AdminController::class, 'create'])             ->name('create');
        Route::get('/email',    [EmailController::class, 'admin_email'])        ->name('email');
        Route::get('/verify',   [AdminController::class, 'verify'])             ->name('verify');
        Route::post('/doLogin', [AdminController::class, 'doLogin'])            ->name('doLogin');
        Route::view('/forgot-password','dashboard.admin.forgot-password')       ->name('forgot-password');
        Route::post('/request-reset', [AdminController::class, 'request_reset'])->name('request-reset');
        Route::get('/reset',        [EmailController::class, 'admin_reset'])    ->name('reset');
        Route::get('/verify-reset', [AdminController::class, 'verify_reset'])   ->name('verify-reset');
        Route::post('/save-reset',  [AdminController::class, 'save_reset'])     ->name('save-reset');
    });
    
    // Setelah Login
    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','dashboard.admin.home')               ->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });

});