<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    function updateData()
    {
        $result = Users::all();
        // $result = Users::get();
        
        // return view('users')->with('users', $result);


        //////data insert//////
        // $result = Users::insert([
        //     'name' => 'sagar pardeshi',
        //     'email' => 's.pardeshi300@gmail.com',   
        //     'password' => '12345'
        // ]);
        // if($result){
        //     return "data inserted";
        // }else{
        //     return "data not inserted";
        // }

        //////data update//////
        // $result = Users::where('id', 2)->update([
        //     'name' => 'sagar pardeshi',
        //     'email' => 'subhanshu15@gmail.com',   
        //     'password' => '123456'
        // ]);
        // if($result){
        //     return "data updated";
        // }else{
        //     return "data not updated";
        // }
        
        //////data delete//////
        // $result = Users::where('id', 2)->delete();
        // if($result){ 
        //     return "data deleted";
        // }else{
        //     return "data not deleted";
        // }

        
                                                    
        return  view('users', ['users' => $result]);
    }
    





}

