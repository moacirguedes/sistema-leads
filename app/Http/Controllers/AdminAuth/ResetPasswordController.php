<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = route('admin.dashboard');
    }

    protected function broker()
    {
        return Password::broker('admins');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('authAdmin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
