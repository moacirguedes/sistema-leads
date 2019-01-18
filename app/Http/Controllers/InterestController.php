<?php

namespace App\Http\Controllers;

use App\Interest;
use Illuminate\Http\Request;
use App\Services\InterestService;

class InterestController extends Controller
{
    public function index(InterestService $interestService)
    {
        $interests = $interestService->getInterests();
        return view('tables.interests.interestTable', compact('interests'));
    }

    public function store(InterestService $interestService, Request $request)
    {
        if ($interestService->storeInterest($request)) {
            return redirect()->route('interests.index');
        }
    }

    public function update(InterestService $interestService, Request $request, $id = 0)
    {
        if ($interestService->updateInterest($request, $id)) {
            return redirect()->route('interests.index');
        }
    }

    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);

        if ($interest->delete()) {
            return redirect()->route('interests.index');
        }
    }
}
