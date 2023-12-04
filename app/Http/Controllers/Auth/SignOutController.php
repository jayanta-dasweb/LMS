<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SignOutController extends Controller
{
    public function process()
    {
        Auth::logout();
        return redirect(route('auth.sign-in.show'));
    }
}
