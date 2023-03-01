<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return view('welcome');
});

Route::get('/next', function () {
    return view('next');
});;

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{id}', [PagesController::class, 'profile']);

});

Route::get("/create",[\App\Http\Controllers\PagesController::class,'create' ]);
Route::get("/hell",[\App\Http\Controllers\PagesController::class,'dashboard' ]);
Route::post("/create",[\App\Http\Controllers\PagesController::class,'store' ]);
Route::get("/list",[\App\Http\Controllers\PagesController::class,'list' ]);
Route::get("/hello",[\App\Http\Controllers\PagesController::class,'new' ]);
Route::get("/delete/{id}",[\App\Http\Controllers\PagesController::class,'delete' ]);
Route::get("/activate/{id}",[\App\Http\Controllers\PagesController::class,'activateUser' ]);
Route::get("edit/{id}",[\App\Http\Controllers\PagesController::class,'edit' ]);
Route::post("update",[\App\Http\Controllers\PagesController::class,'update' ]);
Route::get("signUp",[\App\Http\Controllers\PagesController::class,'signUp' ]);
Route::post("signUpForm",[\App\Http\Controllers\PagesController::class,'signUpForm' ]);
Route::get("login",[\App\Http\Controllers\PagesController::class,'login' ])->name('login');
Route::get("test",[\App\Http\Controllers\PagesController::class,'test' ]);
Route::get("post",[\App\Http\Controllers\PagesController::class,'post' ]);
Route::post("review_post",[\App\Http\Controllers\PagesController::class,'review_post' ]);
Route::post("loginForm",[\App\Http\Controllers\PagesController::class,'loginForm' ]);
Route::get("show",[\App\Http\Controllers\PagesController::class,'review_show' ]);
Route::get("logout",[\App\Http\Controllers\PagesController::class,'logout' ]);



