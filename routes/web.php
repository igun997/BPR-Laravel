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

Route::prefix("master")->namespace("Master")->name("master.")->group(function (){

    Route::prefix("complaint")->name("complaint.")->group(function (){
        Route::get("/","Complaint@index")->name("list");
        Route::get("/add","Complaint@add")->name("add");
        Route::get("/update/{id}","Complaint@update")->name("update");
        Route::post("/update/{id}","Complaint@update_action")->name("update_action");
        Route::post("/add","Complaint@add_action")->name("add_action");
        Route::get("/delete/{id}","Complaint@delete")->name("delete");
    });

    Route::prefix("akun")->name("akun.")->group(function (){
        Route::get("/","Akun@index")->name("list");
        Route::get("/add","Akun@add")->name("add");
        Route::get("/update/{id}","Akun@update")->name("update");
        Route::post("/update/{id}","Akun@update_action")->name("update_action");
        Route::post("/add","Akun@add_action")->name("add_action");
        Route::get("/delete/{id}","Akun@delete")->name("delete");
    });

    Route::prefix("produk")->name("produk.")->group(function (){
        Route::get("/","ProductsControl@index")->name("list");
        Route::get("/add","ProductsControl@add")->name("add");
        Route::get("/update/{id}","ProductsControl@update")->name("update");
        Route::post("/update/{id}","ProductsControl@update_action")->name("update_action");
        Route::post("/add","ProductsControl@add_action")->name("add_action");
        Route::get("/delete/{id}","ProductsControl@delete")->name("delete");
    });

});




