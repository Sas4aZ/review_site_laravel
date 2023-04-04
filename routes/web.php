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
return view('login');
});

Route::get('/next', function () {
    return view('next');
});;

Route::group(['middleware'=>'auth'],function(){
    Route::get("show",[\App\Http\Controllers\PagesController::class,'review_show' ])
        ->name("show");

    Route::get("post",[\App\Http\Controllers\PagesController::class,'post' ]);
    Route::get("view",[\App\Http\Controllers\PagesController::class,'view' ]);
    Route::post("review_post",[\App\Http\Controllers\PagesController::class,'review_post' ]);

    Route::resource('/review',\App\Http\Controllers\reviewcontroller::class);
    Route::resource('/comments',\App\Http\Controllers\commentsController::class);

});


//Route::get("/delete/{id}",[\App\Http\Controllers\PagesController::class,'delete' ]);
Route::get("/activate/{id}",[\App\Http\Controllers\PagesController::class,'activateUser' ]);
Route::get("signUp",[\App\Http\Controllers\PagesController::class,'signUp' ]);
Route::post("signUpForm",[\App\Http\Controllers\PagesController::class,'signUpForm' ]);
Route::get("login",[\App\Http\Controllers\PagesController::class,'login' ])->name('login');
Route::post("loginForm",[\App\Http\Controllers\PagesController::class,'loginForm' ]);
Route::get("logout",[\App\Http\Controllers\PagesController::class,'logout' ]);
//google login routes

Route::get('authorized/google', [\App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [\App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback']);
//Auth::routes();


