<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

Route::controller(Usercontroller::class)->group(function () {
    // read operation route
    Route::get("/", "read")->name("read");

    // create operation route view and post
    Route::view("/add", "add")->name("add");
    Route::post("/add_form", "addForm");

    // update route for getting single user data and put methods
    Route::get("/update/{id}", "singleUser")->name("updateGet");
    Route::put("/updateform/{id}","updateForm");

    // route for delete
    Route::delete("/delete/{id}", "delete")->name("delete");
 });
