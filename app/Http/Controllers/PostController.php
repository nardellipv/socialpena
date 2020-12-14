<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($profile_number)
    {
        $user = User::where('profile_number', $profile_number)
            ->first();

        $posts = Post::with(['user','comment','comment.user'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('web.parts._timeline', compact('user', 'posts'));
    }
}
