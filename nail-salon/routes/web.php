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
        Route::get('/changepassword', "$controller@changepassword")->name('changepassword');
        Route::post('/savechangepassword', "$controller@saveChangePassword")->name('savechangepassword');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
        Route::get('/detail/{id}', "$controller@detail")->name('detail');
    });

    Route::name(".account.")->group(function() {
        $controller = "AccountController";
        Route::get("/login", "$controller@login")->name("login");
        Route::post("/login", "$controller@auth")->name("auth");
        Route::get("/logout", "$controller@logout")->name("logout");
    });

    Route::prefix('/service-category')->name('.servicecate.')->group(function() {
        $controller = "ServiceCategoryController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::get('/update/{id}', "$controller@update")->name('update');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
        Route::post('/save/{id?}', "$controller@save")->name('save');
    });

    Route::prefix('/nail-service')->name('.nailservice.')->group(function(){
        $controller = "NailServiceController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::get('/update/{id}', "$controller@update")->name('update');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
        Route::post('/save/{id?}', "$controller@save")->name('save');
    });
    
    Route::prefix('/ticket')->name('.ticket.')->group(function(){
        $controller = "TicketController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/update/{id}', "$controller@update")->name('update');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
        Route::get('/detail/{id}', "$controller@detail")->name('detail');
        Route::post('/save/{id?}', "$controller@save")->name('save');
        Route::get('/update-status/{id}-{id_status}', "$controller@updateStatus")->name('update_status');
    });

    Route::prefix('/config')->name('.config.')->group(function() {
        $controller = "WebConfigController";
        Route::get('/', "$controller@index")->name('index');
        Route::post('/save', "$controller@save")->name('save');
        Route::get('/about', "$controller@about")->name('about');
        Route::post('/saveabout', "$controller@saveAbout")->name('saveabout');
    });

    Route::prefix('/about')->name('.about.')->group(function() {
        $controller = "WebConfigController";
        Route::get('/', "$controller@about")->name('index');
        Route::post('/saveabout', "$controller@saveAbout")->name('saveabout');
    });

    Route::prefix('/slider')->name('.slider.')->group(function() {
        $controller = "SliderController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::post('/save/{id?}', "$controller@save")->name('save');
        Route::get('/update/{id}', "$controller@update")->name('update');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
    });

    Route::prefix('/gallery')->name('.gallery.')->group(function() {
        $controller = "GalleryController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::post('/save/{id?}', "$controller@save")->name('save');
        Route::get('/update/{id}', "$controller@update")->name('update');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
    });

    Route::prefix('/subscriber')->name('.subscriber.')->group(function() {
        $controller = "SubscriberController";
        Route::get('/', "$controller@index")->name('index');
    });

    Route::prefix('/promotion')->name('.ticketpromo.')->group(function() {
        $controller = "UserTicketPromoController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/create', "$controller@create")->name('create');
        Route::get('/delete/{id}', "$controller@delete")->name('delete');
        Route::get('/reset/{id}', "$controller@reset")->name('reset');
        Route::post('/createsave/{id?}', "$controller@save")->name('createsave');
        Route::get('/add-checked', "$controller@addChecked")->name('addcheck');
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
        Route::get("/profile", "$controller@profile")->name("profile");
        Route::get('/changepassword', "$controller@changepassword")->name('changepassword');
        Route::post('/savechangepassword', "$controller@saveChangePassword")->name('savechangepassword');
    });

    Route::prefix('/booking')->name('booking.')->group(function() {
        $controller = "BookingController";
        Route::get('/', "$controller@index")->name('index');
        Route::post('/save', "$controller@save")->name('save');
        Route::get('/cancel/{id}', "$controller@cancel_appoinment")->name('cancel_appoinment');
    });

    Route::prefix('/pricing')->name('pricing.')->group(function() {
        $controller = "PricingController";
        Route::get('/', "$controller@index")->name('index');
        Route::get('/detail/{id}', "$controller@detail")->name('detail');
    });
    Route::prefix('/subscriber')->name('subscriber.')->group(function() {
        $controller = "SubscriberController";
        Route::post('/save', "$controller@save")->name('save');
    });
});