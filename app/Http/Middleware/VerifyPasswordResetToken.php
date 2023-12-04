<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class VerifyPasswordResetToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the token from the route parameters
        $token = $request->route('token');

        // Check if the token is present
        if (!$token) {
            // Redirect to the route handling invalid tokens
            return Redirect::route('error.invalid-token');
        }

        // Search for the token in the password_reset table
        $passwordReset = PasswordReset::where('token', $token)->first();

        // Check if the token is available in the table
        if (!$passwordReset) {
            // Redirect to the route handling invalid tokens
            return Redirect::route('error.invalid-token');
        }

        // Check if the token is expired (24 hours limit)
        if (Carbon::parse($passwordReset->created_at)->addHours(24) < now()) {
            // Redirect to the route handling expired tokens
            return Redirect::route('error.token-expired');
        }


        return $next($request);
    }
}
