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

// Route::get('/home', Home::class)->middleware('auth:web');
Route::get('/home', function () {
    return view('index');
})->middleware('auth:web');


Route::get('/login', LoginForm::class);

Route::get('/register', RegisterForm::class);
