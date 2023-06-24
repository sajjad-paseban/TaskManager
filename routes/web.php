<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('authLogin')->group(function(){

    Route::get('/login', function() {
        return view('pages.login');
    })->name('login');

    Route::get('/signup', function() {
        return view('pages.signup');
    })->name('signup');

});


Route::middleware('authNotLogin')->group(function(){

    Route::get('/', function () {

        $all = User::find(session()->get('auth-user')['id'])->tasks;
        $done = User::find(session()->get('auth-user')['id'])->tasks()->where('status',1)->get();
        $incomplete = User::find(session()->get('auth-user')['id'])->tasks()->where('status',0)->get();
        return view('pages.home',compact('all','done','incomplete'));
    })->name('home');

    Route::get('/logout', function() {
        session()->flush();
        return view('pages.login');
    })->name('logout');

    Route::resource('task',TaskController::class);
});

Route::resource('user',UserController::class);

Route::post('user/check',[UserController::class,'checkUser'])->name('user.check');
