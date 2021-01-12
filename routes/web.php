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


Route::name("landing.")->namespace("Landing")->group(function (){
    Route::get("/","Index@index")->name("index");
});

Route::get("/login","Auth@index")->name("login");

Route::post("/login","Auth@login")->name("login.post");
Route::post("/register","Auth@register_action")->name("register.post");
Route::get("/register","Auth@register")->name("register");
Route::get("/logout","Auth@logout")->name("logout");


Route::get("/dashboard","Dashboard@index")->middleware("gateway:0|1|2|3|4|5")->name("dashboard");
//Admin




