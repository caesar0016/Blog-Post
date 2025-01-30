<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    //-- gives the user to modify if
    // -- user_id == post.user_id
    public function modify(User $user, Post $post) : bool {
        return $user->id === $post->user_id;
    }
}
