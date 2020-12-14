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

    public function edit($profile_number)
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
        $userUpdate->dni = $request['dni'];
        $userUpdate->phone = $request['phone'];
        $userUpdate->birth_date = $request['birth_date'];
        $userUpdate->number_member = $request['number_member'];

        $userUpdate->save();

        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
