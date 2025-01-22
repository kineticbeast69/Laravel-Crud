<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    function read(){
        return view("read");
    }

    function add(){
        $name = "shubham";
    }

    function update(){
        return "this is an update page.";
    }


    function delete(){
        return "this is an delete page.";
    }

    function singleUser(){
        return "this is an single user.";
    }


}
