<?php

namespace App\Services;

use App\Interest;
use App\LeadInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestService
{

    public function getInterests()
    {
        if (Auth::guard('admin')->check()) {
            $interests = Interest::all();            
        } else {
            $interests = Interest::where('user_id', Auth::user()->id)->get();
        }

        return $interests;
    }

    public function storeInterest(Request $request)
    {
        $interest = new Interest;

        $interest->description = $request->description;
        $interest->user_id = Auth::guard('admin')->check() ? null : Auth::user()->id;
        if ($interest->save()) return true;
    }

    public function updateInterest(Request $request, $id)
    {
        $id = $request->input("id");
        $interest = Interest::findOrFail($id);
        $interest->description = $request->editDescription;
        if($interest->update()) return true;
    }
}