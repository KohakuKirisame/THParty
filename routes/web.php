<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;

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

//子域名路由

Route::domain('www.thparty.fun')->group(function (){
	Route::any('/', function () {
		return redirect('https://thparty.fun');
	});
	Route::any('/{any}', function () {
		return redirect('https://thparty.fun'.$_SERVER['REQUEST_URI']);
	});
});

Route::domain('my.thparty.fun')->group(function (){
	Route::get('/',function (){
		return redirect('/Profile');
	});
	Route::get('/Profile',[UserController::class,'changeProfilePage'])->middleware('auth');
});

Route::domain('{domain}.thparty.fun')->group(function () {
    Route::get('/', [PartyController::class, 'partyHomepage']);
});

//本站路由
	Route::get('/', function () {
        return view('beian');
    });
    Route::get('/About', [HomeController::class, 'aboutPage']);
	Route::get('/Register', function () {
		return view('register');
	});
	Route::get('/Login',[UserController::class,"loginPage"])->name('login');

	Route::prefix("Actions")->group(function (){
		Route::post("/SendSMSCaptcha",[UserController::class,'sendCaptcha']);
		Route::post("/Register",[UserController::class,'register']);
		Route::match(['get','post'],'/Logout',[UserController::class,'logout']);
		Route::post('/Login',[UserController::class,'login']);
		Route::get('/Join/{pid}',[ParticipantController::class,'joinParty'])->middleware('auth');
		Route::get('/Quit/{pid}',[ParticipantController::class,'quitParty'])->middleware('auth');
		Route::post('/ChangeAvatar',[UserController::class,'changeAvatar'])->middleware('auth');
		Route::post('/ChangeUserInfo',[UserController::class,'changeUserInfo'])->middleware('auth');
	});
