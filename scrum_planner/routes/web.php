<?php


use App\Http\Controllers\EditMeetingController;
use App\Http\Controllers\InviteController;
use App\Mail\NotificationEmail;
use App\Models\User;
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
    return redirect(route('my-meetings'));
});

Route::get('/sign-in', [UserController::class, 'Login'])->name('sign-in');

Route::post('/sign-in', [UserController::class, 'SignIn']);

Route::get('/sign-out', [UserController::class,'LogOut']);

Route::get('/sign-up', [UserController::class,'Register']);


Route::post('/sign-up', [UserController::class, 'SignUp']);
Route::get('/users', [UserController::class, 'List'])->name('users');


Route::get('/users/change-status/{user}', [UserController::class, 'ChangeStatus']);
Route::post('/users/change-role/{user}',[UserController::class, 'ChangeRole']);
Route::post('/users/changepasswd/{user}',[UserController::class,'ChangePassword']);
Route::get('/team/create',[TeamController::class, 'CreateTeamSite']);

Route::post('/team/create',[TeamController::class, 'TeamCreation']);

Route::get('/manage-teams', [TeamController::class, 'ListTeams']);

Route::get('/edit-profile',[UserController::class,'Profile']);
Route::post('/edit-profile',[UserController::class,'EditProfile']);

Route::get('/meeting/show/{meeting}', [MeetingController::class, 'ShowMeeting'])->middleware('auth');
Route::get('/meeting/create', [MeetingController::class, 'CreateMeetingSite']);
Route::post('/meeting/create', [MeetingController::class, 'MeetingCreation']);
Route::post('/meeting/comment', [MeetingController::class, 'RecordComment']);
Route::post('/meeting/remove-participant', [MeetingController::class, 'RemoveParticipant']);
Route::post('/meeting/add-participants', [MeetingController::class, 'AddParticipants']);

Route::get('/meeting/edit/{meeting}', [EditMeetingController::class, 'ShowEditForm'])->middleware('auth');
Route::post('/meeting/edit/{meeting}', [EditMeetingController::class, 'EditMeeting'])->middleware('auth');

Route::get('/my-meetings', [MeetingController::class, 'MyMeetingsThisWeek'])->middleware('auth')->name('my-meetings');
Route::get('/my-meetings/{date}', [MeetingController::class, 'MyMeetings'])->middleware('auth');

Route::get('my-invites', [InviteController::class, 'invites'])->middleware('auth');
Route::post('/set-attendance', [InviteController::class, 'SetAttendance'])->middleware('auth');
