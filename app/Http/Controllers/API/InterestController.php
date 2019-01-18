<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Interest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Interest as InterestResource;

class InterestController extends Controller
{
    public function index()
    {
        return InterestResource::collection(Interest::all());
    }

    public function show($id)
    {
        $interest = Interest::where('user_id', $id)->get();

        return new InterestResource($interest);
    }
}
