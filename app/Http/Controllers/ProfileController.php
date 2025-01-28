<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ProfileController extends Controller
{
    //-- Profile Page --

    public function index(){
        $posts = Auth::user()->posts()->latest()->paginate(6);
        return view('users.profile', ['posts' => $posts]);
    }
}
