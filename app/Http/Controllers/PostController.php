<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
    // dd($request);
    // Validate the input
    $request->validate([
        'title' => ['required', 'max:255'],
        'body' => ['required'],
        'image' => 'mimes:jpg,webp,png',
    ]);

    $path = null;
    // Check if the user uploaded an image
    if ($request->hasFile('image')) {
        // Ensure the file is valid before storing it
        if ($request->file('image')->isValid()) {
            $path = $request->file('image')->store('cover_pictures', 'public');
        } else {
            return back()->with('error', 'Invalid image file');
        }
    }

    // Create a new post
    Auth::user()->posts()->create([
        'title' => $request->title,
        'body' => $request->body,
        'image' => $path,
    ]);

    return back()->with('success', 'Post was created successfully!');
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
        // dd($request);

        $fields = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'image' => 'nullable|file|max:3000|mimes:webp, png,jpg',  // Correct syntax for image validation
    ]);


        $path = $post->image ?? null;
        //-- Check if the user uploaded an image
        if($request->hasFile('image')){
            //-- If image exist delete the image assosciated
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
        }
        //--This u[date the image under disk public into coverPictures]
        $path = Storage::disk('public')->put('cover_pictures', $request->image);
        
        //Update a post
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' =>$path
        ]);
        
        // return redirect()->with('success', 'Done updating the posts');

        return redirect()->route('profile')->with('success', 'Your post was updated!!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('modify', $post);

        //-- delete image if exist;

        if($post->image){

            //-- storage public delete posts on imagetbl
            Storage::disk('public')->delete($post->image);

        }

        //-- This deletes the posts
        $post->delete();
        // dd('ok');

        return back()->with('deleted', 'Post was deleted!...');
    }
}

