<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInterestRequest;
use App\Interest;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function editInterest($profile_number)
    {
        $interestsUser = Interest::where('user_id', Auth::user()->id)
            ->get();

        $interests = Interest::get();

        return view('web.parts.profile._editInterest', compact('interests', 'interestsUser'));
    }

    public function updateInterest(AddInterestRequest $request)
    {
        Interest::create([
            'interest' => $request['interest'],
            'user_id' => Auth::user()->id,
        ]);

        toastr()->success('Se agregó correctamente tu interes', 'Interes agregado', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }

    public function deleteInterest($id)
    {
        $interest = Interest::find($id);        
        $interest->delete();

        toastr()->success('Se eliminó correctamente tu interes', 'Interes eliminado', ["positionClass" => "toast-bottom-right", "progressBar" => "true"]);
        return back();
    }
}
