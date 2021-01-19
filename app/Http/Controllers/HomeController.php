<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginNumberMemberRequest;
use App\Profile;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comment', 'comment.user'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $user = User::where('id', Auth::user()->id)
            ->first();

        /* $feed= FeedReader::read('https://www.feedforall.com/sample.xml');
            dd($feed); */

        return view('web.index', compact('posts', 'user'));
    }

    public function step3(LoginNumberMemberRequest $request)
    {        
        $user = User::where('number_member', $request->number_member)
            ->first();

        if (empty($user)) {
            $request->session()->flash('messageRegister', 'No encontramos el número de socio en nuestra base de datos. Por favor comuniquese con la peña para que le den el alta.');
            return view('web.parts.login.registerStep2');
        }

        if ($user->status == 'ACTIVE') {
            $request->session()->flash('messageRegister', 'El usuario ya se encuentra registrado.');
            return view('web.parts.login.registerStep2');
        }


/*         $path = 'users/' . $user->number_member;

        if (!is_dir($path)) {
            mkdir('users/' . $user->number_member);
        } */

        return view('web.parts.login.registerStep3', compact('user'));
    }

    public function registerUpdate(Request $request)
    {
        $user = User::where('number_member', $request->number_member)
            ->first();

        $profile_number = mt_rand(1000000000, 9999999999);

        $user->profile_number = $profile_number;
        $user->email = $request['email'];
        $user->status = 'ACTIVE';
        $user->password = bcrypt($request['password']);

        $user->save();

        Profile::create([
            'user_id' => $user->id,
        ]);

        $path = 'users/' . $profile_number;

        if (!is_dir($path)) {
            mkdir('users/' . $profile_number);
        }

        return view('auth.login');
    }
}
