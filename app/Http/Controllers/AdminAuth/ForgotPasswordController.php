<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected function broker()
    {
        return Password::broker('admins');
    }

    public function showLinkRequestForm()
    {
        return view('authAdmin.passwords.email');
    }
}
