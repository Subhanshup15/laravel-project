<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FromCOntroller extends Controller
{
    //http request////
    public function login(Request $request)
    {
        /////req object/////
        echo "req method  is " . $request->method() . "<br>";

        ///req url///
        echo "req url  is " . $request->url() . "<br>";

        ///req full url///
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');


        ///     
        return "Name: $name, Email: $email, Password: $password";

        redirect('users');
    }
}
