<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\NewPostRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    public function index($profile_number)
    {
        $user = User::where('profile_number', $profile_number)
            ->first();

        $posts = Post::with(['user', 'comment', 'comment.user'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('web.parts._timeline', compact('user', 'posts'));
    }

    public function newPost(NewPostRequest $request)
    {
        $post = Post::create([
            'text' => $request['text'],
            'user_id' => Auth::user()->id,
        ]);

        if ($request->picture) {
            $image = $request->file('picture');
            $input['picture592'] = '592x320-' . $image->getClientOriginalName();
            $input['picture301'] = '301x160-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(592, 320)->save('users/' . Auth::user()->profile_number . '/' . $input['picture592']);
            $img->fit(301, 160)->save('users/' . Auth::user()->profile_number . '/' . $input['picture301']);

            $post->picture = Str::after($input['picture592'], '-');
        }

        $post->save();

        toastr()->success('Publicación Realizada', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function commentPost(CommentRequest $request, $id)
    {
        Comment::create([
            'comment' => $request['comment'],
            'user_id' => Auth::user()->id,
            'post_id' => $id,
        ]);

        toastr()->success('Comentario Realizado', '', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        $url = url()->previous() . '#' . $request['idComment'];

        return Redirect::to($url);
    }

    public function likePost(Request $request, $id)
    {
        $post = Post::find($id)
            ->increment('like');

            $url = url()->previous() . '#' . $request['idLike'];

            return Redirect::to($url);
    }    
    
    public function disLikePost(Request $request, $id)
    {
        $post = Post::find($id)
            ->increment('disLike');

            $url = url()->previous() . '#' . $request['disLikePost'];

            return Redirect::to($url);
    }
}
