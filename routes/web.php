<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::domain('{act}.thparty.fun')->group(function () {
    Route::get('/', function ($act) {
        if($act == 'www'){
            return redirect("https://thparty.fun");
        }
        return redirect("https://".$act.'.edu.cn');
    });
});

//本站路由
	Route::get('/', function () {
        return view('home');
    });
    Route::get('/About', [HomeController::class, 'aboutPage']);
	Route::get('/Register', function () {
		return view('register');
	});
	Route::get('/Login',[UserController::class,"loginPage"]);

	Route::prefix("Actions")->group(function (){
		Route::post("/SendSMSCaptcha",[UserController::class,'sendCaptcha']);
		Route::post("/Register",[UserController::class,'register']);
		Route::match(['get','post'],'/Logout',[UserController::class,'logout']);
		Route::post('/Login',[UserController::class,'login']);
	});
