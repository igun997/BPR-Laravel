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


Route::get("/dashboard","Dashboard@index")->middleware("gateway:0|1|2|3|4|5|6|7")->name("dashboard");
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

Route::prefix("pengaduan")->name("complaint.")->group(function (){
    Route::get("/","Pengaduan@index")->name("list");
    Route::post("/update_status","Pengaduan@update_status")->name("update_status");
    Route::get("/delete/{id}","Pengaduan@delete")->name("delete");
    Route::get("/detail/{id}","Pengaduan@detail")->name("detail");
});

Route::prefix("teller")->name("teller.")->group(function (){
    Route::get("/","Teller@index")->name("list");
    Route::get("/update_status/{id}","Teller@update_status")->name("update_status");
    Route::get("/delete/{id}","Teller@delete")->name("delete");
    Route::get("/detail/{id}","Teller@detail")->name("detail");
});


Route::prefix("transaksi")->name("transaksi.")->group(function (){
    Route::get("/","Transaksi@index")->name("list");
    Route::get("/update_status/{id}","Transaksi@update_status")->name("update_status");
    Route::get("/delete/{id}","Transaksi@delete")->name("delete");
    Route::get("/detail/{id}","Transaksi@detail")->name("detail");
    Route::get("/debit/{id?}","Transaksi@debit")->name("debit");
    Route::get("/add/{id?}","Transaksi@add")->name("add");
    Route::get("/kredit/{id?}","Transaksi@kredit")->name("kredit");
    Route::post("/submit/{id?}","Transaksi@submit")->name("submit");
});


Route::prefix("nasabah")->name("nasabah.")->namespace("Nasabah")->group(function (){
    Route::prefix("transaksi")->name("transaksi.")->group(function (){
        Route::get("/","Transaksi@index")->name("list");
        Route::get("/detail/{id}","Transaksi@detail")->name("detail");
    });
    Route::prefix("kredit")->name("kredit.")->group(function (){
        Route::get("/","Kredit@index")->name("list");
        Route::get("/detail/{id}","Kredit@detail")->name("detail");
    });
});




