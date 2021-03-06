<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Interest;
use App\Profile;
use App\Province;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index($profile_number)
    {
        $user = User::where('profile_number', $profile_number)
            ->first();

        $interests = Interest::where('user_id', $user->id)
            ->get();

        return view('web.parts.profile._profile', compact('user', 'interests'));
    }

    public function editProfile($profile_number)
    {
        $user = User::where('profile_number', $profile_number)
            ->first();

        $provinces = Province::all();

        if (!empty($user->profile->province->name)) {
            $regionUser = Region::where('province_id', $user->profile->province->id)
                ->get();
        }

        return view('web.parts.profile._editProfile', compact('user', 'provinces', 'regionUser'));
    }

    public function updateProvince()
    {
        $provinceId = request()->input(['provincia']);
        $userId = request()->input(['usuario']);

        $provinces = Province::all();

        $user = User::where('profile_number', $userId)
            ->first();


        $provinceUpdate = Profile::where('user_id', $user->id)
            ->first();

        if ($provinceUpdate) {
            $provinceUpdate->province_id = $provinceId;
            $provinceUpdate->save();
        } else {
            Profile::create([
                'user_id' => $user->id,
                'province_id' => $provinceId
            ]);
        }

        if (!empty($user->profile->province->name)) {
            $regionUser = Region::where('province_id', $user->profile->province->id)
                ->get();
        }

        return view('web.parts.profile._editProfile', compact('user', 'provinces', 'regionUser'));
    }

    public function updateProfile(ProfileUpdateRequest $request, $id)
    {

        $profileUpdate = Profile::where('user_id', $id)
            ->first();

        $profileUpdate->about = $request['about'];
        $profileUpdate->region_id = $request['region_id'];

        $profileUpdate->save();

        $userUpdate = User::find($id);

        $userUpdate->email = $request['email'];
        $userUpdate->nickname =  $request['nickname'];
        $userUpdate->dni = $request['dni'];
        $userUpdate->phone = $request['phone'];
        $userUpdate->birth_date = $request['birth_date'];
        $userUpdate->number_member = $request['number_member'];

        $userUpdate->save();

        toastr()->success('Se actualizó correctamente tu perfil', 'Perfil Actualizado', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function editpassword($profile_number)
    {
        return view('web.parts.profile._changePassword');
    }

    public function updatepassword(Request $request)
    {
        $user = User::where('profile_number', Auth::user()->profile_number)
            ->first();
        $user->password = Hash::make($request['password']);
        $user->save();

        toastr()->success('Se actualizó correctamente tu contraseña', 'Contraseña Actualizada', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function editsocial($profile_number)
    {
        return view('web.parts.profile._socialNetwork');
    }

    public function updatesocial(Request $request)
    {
        $user = Profile::where('user_id', Auth::user()->id)
            ->first();
        $user->facebook = $request['facebook'];
        $user->instagram = $request['instagram'];
        $user->twitter = $request['twitter'];
        $user->save();


        toastr()->success('Se actualizó correctamente tu redes sociales', 'Redes Actualizadas', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }


    public function updatephoto(Request $request)
    {

        $user = User::where('profile_number', Auth::user()->profile_number)
            ->first();

        if ($request->picture) {
            $image = $request->file('picture');
            $input['picture195'] = '195x195-' . $image->getClientOriginalName();
            $input['picture57'] = '57x89-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(195, 195)->save('users/' . Auth::user()->profile_number . '/' . $input['picture195']);
            $img->fit(57, 89)->save('users/' . Auth::user()->profile_number . '/' . $input['picture57']);

            $user->photo = Str::after($input['picture195'], '-');
        }

        $user->save();

        toastr()->success('Se actualizó correctamente tu foto de perfil', 'Foto Actualizada', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
