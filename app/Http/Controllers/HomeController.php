<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginNumberMemberRequest;
use App\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.index');
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

        return view('web.parts.login.registerStep3', compact('user'));
    }

    public function registerUpdate(Request $request)
    {
        $user = User::where('number_member', $request->number_member)
            ->first();

        $user->status = 'ACTIVE';
        $user->password = bcrypt($request['password']);

        $user->save();

        return view('auth.login');
    }
}
