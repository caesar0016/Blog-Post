<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //this is the rehistro function

    public function register(Request $request) {

        //here lies the laravel 11 validation rule 
        $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']
            
        ]);

        dd("$request->username");
    }
}
