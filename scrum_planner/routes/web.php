<?php

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

Route::get('/', function () {
    return redirect(route('sign-in'));
});

Route::get('/sign-in', function() {
    return view('users.signin');
})->name('sign-in');

Route::get('/sign-up', function() {
    return view('users.signup');
});
