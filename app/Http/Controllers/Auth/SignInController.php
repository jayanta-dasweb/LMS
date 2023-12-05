<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditLog;

class SignInController extends Controller
{
    public function show()
    {
        return view('auth.signIn');
    }

    public function process(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();

            // Log successful login
            AuditLog::create([
                'user_id' => $user->id,
                'activity' => 'login',
                'details' => 'User logged in successfully.',
            ]);

            return response()->json([
                'success' => true,
                'redirectUrl' => route('master.costing-charges.create.process'), // Change to your desired redirect URL
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
            ]);
        }
    }
}
