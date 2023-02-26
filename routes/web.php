<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartyController;

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
/*
Route::domain('{act}.thparty.fun')->group(function () {
    Route::get('/', function ($act) {
        if($act == 'www'){
            return redirect("https://thparty.fun");
        }
        return redirect("https://".$act.'.edu.cn');
    });
});*/

//本站路由
Route::domain("www.thparty.fun")->group(function (){
	Route::get('/', function () {
		return view('beian');
	});
});
Route::domain('thparty.fun')->group(function () {
    Route::get('/', function () {
        return view('beian');
    });
    Route::get('/About', function () {
        return view('about');
    });
});

Route::get("/U",[PartyController::class,'createParty']);

