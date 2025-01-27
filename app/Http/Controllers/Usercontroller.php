<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Usercontroller extends Controller
{

    // read funtion handle read operation.
    public function read(){
        $table = DB::table("user_details");
        $data = $table->select("username","email","id")->paginate(8);//fecthing all the data from database in pagination fomr
        if(count($data)==0){//checking the data length equals zero
            $noData = ["No user records."];
            return view("read", ["datas" => $noData]);
        }else{
            return view("read",["datas"=>$data]);
        }
    } 


    // add function handle create operation
    public function addForm(Request $request){
        $table = DB::table("user_details");//calling table

        // valdating the user
        $validate = $request->validate([
            "username"=>"required|string|min:5|max:50",
            "email"=>"required|email",
            "password"=>"required|min:4|max:8",
        ]);

        $hash_password = Hash::make($request->password);//hashing the password info
        // checking the user exists or not
        $check_user = $table->where(["username" => $request->username, "email" => $request->email])->exists();//query for checking the user
        if($check_user){
            return back()->with("danger","User already exists.");
        }

        // adding the user info in database
        $addUser = $table->insert([//query for adding the user
            "username"=>$request->username,
            "email"=>$request->email,
            "password"=>$hash_password,
        ]);

        if($addUser){
            return redirect()->route("read")->with("success","User added Succesfully.");
        }else{
            return back()->with("info", "Can't add the user.");
        }
    } 


    // single user data function
    public function singleUser($id){
        $table = DB::table("user_details");
        // checking user exist or not
        $check_user = $table->select("id","username","email")->where("id",$id)->first();//query for checking user
        if($check_user){
            return view("update",["data"=>$check_user]);
        }else{
            return redirect()->route("read")->with("warning", "Invalid User");
        }
    }


    // updateForm handle update operation
    function updateForm(Request $request,$id){
        $table = DB::table("user_details");//table info

        $validate = $request->validate([//validating the form
            "username"=>"required|string|min:5|max:25",
            "email"=>"required|email",
        ]);

        $updateUser = $table->where("id", $id)->update([
            "username"=>$request->username,
            "email"=>$request->email,
        ]);//update query

        if($updateUser){
            return redirect()->route("read")->with("success", "User updated succesfully.");
        }else{
            return back()->with("warning", "Cant updated the user info");
        }
    }



    // deleting the user data
    public function delete($id){
        $table = DB::table("user_details");

        // deleting the user
        $delete_user = $table->where("id", $id)->delete();//query for deleting the user

        if($delete_user){
            return redirect()->route("read")->with("success", "User deleted succesfully");
        }else{
            return back()->with("warning", "Can't deleted the user.");
        }

    }
}
