<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // This is the register function
    public function register(Request $request)
    {
        // Laravel 11 validation rule
        $fields = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']
        ]);

        User::create($fields);

        // Create the user in the database
        dd($fields);

        // Dump the username and stop execution
        dd($request->username); // No need for string interpolation
    }
}
