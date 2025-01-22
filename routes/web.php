<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;





Route::controller(Usercontroller::class)->group(function(){
    // read page route
    Route::get("/","read")->name("read");

    // add page get and post route
    Route::view("/add","add")->name("add");

    // update page get and put route
    Route::view("/update/{userID}","update")->name("update");

    // delete page get and delete route
    Route::get("/delete/{userID}","delete")->name("delete");

});
