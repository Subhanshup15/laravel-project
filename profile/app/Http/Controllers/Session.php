<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session extends Controller
{
    function login(Request $request){
        $request->session()->put('name', $request->name);
        $request->session()->put('allData', $request->all());    
        // return $request->input();
        return redirect('reasume');
    }

    function logout(Request $request){
        $request->session()->forget('name');
        return redirect('session');
    }
}
