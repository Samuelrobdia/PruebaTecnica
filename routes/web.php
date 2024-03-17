<?php

use App\Livewire\Home;
use App\Livewire\LoginForm;
use App\Livewire\RegisterForm;
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


Route::get('/home', function () {
    return view('index');
})->middleware('auth:web')->name('home');

Route::get('/', LoginForm::class)->name('login');

Route::get('/register', RegisterForm::class);

Route::get('/errors/404', function() {
    return view('errors.404');
})->name('errors.404');