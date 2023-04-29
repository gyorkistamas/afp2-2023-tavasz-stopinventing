<?php


use App\Http\Controllers\EditMeetingController;
use App\Http\Controllers\EditTeamController;
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


// User authentication
Route::middleware('guest')->group(function (){
    Route::get('/request-password', [UserController::class, 'RequestNewPassword']);
    Route::get('/sign-in', [UserController::class, 'Login'])->name('sign-in');
    Route::post('/sign-in', [UserController::class, 'SignIn']);
    Route::get('/sign-up', [UserController::class,'Register']);
    Route::post('/sign-up', [UserController::class, 'SignUp']);
});

//Sign out
Route::get('/sign-out', [UserController::class,'LogOut'])->middleware('auth');

// Admin routes for users
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/users', [UserController::class, 'List'])->name('users');

    Route::get('/users/change-status/{user}', [UserController::class, 'ChangeStatus']);
    Route::post('/users/change-role/{user}',[UserController::class, 'ChangeRole']);
    Route::post('/users/changepasswd/{user}',[UserController::class,'ChangePassword']);
});


//Team modification and creation
Route::middleware(['auth', 'scrum'])->group(function (){
    Route::get('/team/create',[TeamController::class, 'CreateTeamSite']);
    Route::post('/team/create',[TeamController::class, 'TeamCreation']);
    Route::get('/manage-teams', [TeamController::class, 'ListTeams']);
    Route::post('/team/removemember/{team}', [EditTeamController::class, 'RemoveMember']);
    Route::get('/team/edit/{team}', [EditTeamController::class, 'EditForm']);
    Route::post('/team/edit/{team}', [EditTeamController::class, 'EditTeam']);
    Route::get('/team/delete/{team}', [EditTeamController::class, 'DeleteTeam']);
});


//Edit profile
Route::middleware('auth')->group(function () {
    Route::get('/edit-profile',[UserController::class,'Profile']);
    Route::post('/edit-profile',[UserController::class,'EditProfile']);
});

//Meeting related routes
Route::middleware(['auth', 'scrum'])->group(function () {
    Route::get('/meeting/create', [MeetingController::class, 'CreateMeetingSite']);
    Route::post('/meeting/create', [MeetingController::class, 'MeetingCreation']);
    Route::post('/meeting/remove-participant', [MeetingController::class, 'RemoveParticipant']);
    Route::post('/meeting/add-participants', [MeetingController::class, 'AddParticipants']);

    Route::get('/meeting/edit/{meeting}', [EditMeetingController::class, 'ShowEditForm']);
    Route::post('/meeting/edit/{meeting}', [EditMeetingController::class, 'EditMeeting']);
    Route::get('/meeting/delete/{meeting}', [EditMeetingController::class, 'DeleteMeeting']);
});

// Meeting routes for all users
Route::middleware('auth')->group(function () {
    Route::get('/meeting/show/{meeting}', [MeetingController::class, 'ShowMeeting']);
    Route::post('/meeting/comment', [MeetingController::class, 'RecordComment']);

    Route::get('/my-meetings', [MeetingController::class, 'MyMeetingsThisWeek'])->name('my-meetings');
    Route::get('/my-meetings/{date}', [MeetingController::class, 'MyMeetings']);

    Route::get('my-invites', [InviteController::class, 'invites']);
    Route::post('/set-attendance', [InviteController::class, 'SetAttendance']);
});

Route::get('/manage-meetings', [MeetingController::class, 'ListMeetings'])->middleware(['auth', 'scrum']);
