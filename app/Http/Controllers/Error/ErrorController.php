<?php

namespace App\Http\Controllers\error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function showInvalidToken()
    {
        return view('errorsPages.invalidToken');
    }

    public function showTokenExpired()
    {
        return view('errorsPages.tokenExpired');
    }
}
