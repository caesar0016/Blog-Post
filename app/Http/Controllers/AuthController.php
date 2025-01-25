<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // This is the register function
    public function register(Request $request)
    {
        // Laravel 11 validation rule
        $fields = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($fields);

        Auth::login($user);

        return redirect()->route('home');

        // Create the user in the database
        dd($fields);

        // Dump the username and stop execution
        dd($request->username); // No need for string interpolation
        
    }

    //This is the login function for the user

    public function login(Request $request)
    {
        $fields = $request->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);
    
        // this tries to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended();
            
            // Debug and print $fields and remember value
            //THis code prints all the fields
         //   dd($fields, 'Remember: ' . $request->remember);
        } else {

            //failed is the name of the error which was to be passed
            //on error message belower remember me
            return back()->withErrors([
                'failed' => 'Account does not exist!!'
            ]);
        }
    
        // dd('You loggs lol');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
}
