<?php

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

Route::prefix("/admin")->namespace("App\Http\Controllers\Admin")->name("admin")->group(function() {
    Route::name(".home.")->group(function() {
        $controller = "HomeController";
        Route::get("/", "$controller@index")->name("index");
    });

    Route::prefix('/user')->name('.user.')->group(function(){
        $controller = "UserController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::post('/createsave/{id?}', "$controller@save")->name('createsave');
        Route::get('/update/{id}', "$controller@update")->name('update');
    });

    Route::name(".account.")->group(function() {
        $controller = "AccountController";
        Route::get("/login", "$controller@login")->name("login");
        Route::post("/login", "$controller@auth")->name("auth");
        Route::get("/logout", "$controller@logout")->name("logout");
    });
});

Route::prefix("/")->namespace("App\Http\Controllers\Client")->name("client.")->group(function() {
    $controller = "HomeController";
    Route::get("/", "$controller@index")->name("home");

    Route::name("account.")->group(function() {
        $controller = "AccountController";
        Route::get("/login", "$controller@login")->name("login");
        Route::post("/login", "$controller@auth")->name("auth");
        Route::get("/logout", "$controller@logout")->name("logout");
        Route::get("/register", "$controller@register")->name("register");
        Route::post("/register", "$controller@save")->name("save");
    });
});