<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Gets the latest also
        // $posts = Post::orderBy('created_at', 'desc')->get();

        //gets the oldest first
        // $posts = Post::orderBy('created_at', 'asc')->get();
        
        //This method gets the latest
        $posts = Post::latest()->paginate(6);
    
        // Pass the posts variable to the view
        return view('posts.index', ['posts' => $posts]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd(Auth::user()->posts());
        //Validate
        $fields = $request->validate([

            'title' => ['required', 'max:255'],
            'body' => ['required']

        ]); 

        //Create a post
      //  Post::create(['user_id' => Auth::id(), ...$fields]);
        Auth::user()->posts()->create($fields);
        return back()->with('success', 'Post was created lol');

        //Redirect the user
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // dd($post);  // Check the post data here
        return view('posts.show', ['post' => $post]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        //-- This is gate authorize that have modify function
        //-- modify function is in the policy of PostsController
        Gate::authorize('modify', $post);

        //-- This edit the data
        return view('users.editPost', ['post'=> $post]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //-- THis is the update function

        $fields = $request->validate([

            'title' => ['required', 'max:255'],
            'body' => ['required']

        ]); 

        //Update a post
        $post->update($fields);
        
        // return redirect()->with('success', 'Done updating the posts');

        return redirect()->route('profile')->with('success', 'Your post was updated!!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //-- This deletes the posts
        $post->delete();
        // dd('ok');

        return back()->with('deleted', 'Post was deleted!...');
    }
}

