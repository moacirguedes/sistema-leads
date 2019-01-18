<?php

namespace App\Http\Controllers;

use App\User;
use App\Lead;

class TableController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('tables.userTable', compact('users'));
    }
}