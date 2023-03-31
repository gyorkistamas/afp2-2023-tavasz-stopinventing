<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;

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

Route::get('/sign-in', [UserController::class, 'Login'])->name('sign-in');

Route::post('/sign-in',[UserController::class, 'SignIn']);
Route::get('/sign-out',[UserController::class,'LogOut']);
Route::get('/sign-up', [UserController::class,'Register']);
Route::post('/sign-up',[UserController::class, 'SignUp']);

Route::get('/team/create',[TeamController::class, 'CreateTeam']);
Route::post('/team/create',[TeamController::class, 'Creation']);

Route::get('/meeting/show/{meeting}', [MeetingController::class, 'ShowMeeting'])->middleware('auth');
Route::post('/meeting/comment', [MeetingController::class, 'RecordComment']);