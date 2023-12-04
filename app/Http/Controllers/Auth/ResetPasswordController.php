<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\PasswordResetSuccessMail;

class ResetPasswordController extends Controller
{
    public function show()
    {
        return view('auth.resetPassword');
    }

    public function process(Request $request)
    {
        // Validation rules
        $rules = [
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password',
            'reset_token' => 'required|exists:password_resets,token',
        ];

        // Custom validation messages
        $messages = [
            'reset_token.exists' => 'Invalid reset token.',
        ];

        // Validate the request
        $validator = validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        // Get the password reset record
        $resetRecord = DB::table('password_resets')->where('token', $request->reset_token)->first();

        // Check if the token is expired
        if (!$resetRecord || $this->tokenExpired($resetRecord->created_at)) {
            return response()->json([
                'success' => false,
                'message' => 'The reset token has expired.',
            ]);
        }

        // Update user password
        $user = DB::table('users')->where('email', $resetRecord->email)->first();

        if ($user) {
            DB::table('users')->where('email', $resetRecord->email)->update([
                'password' => Hash::make($request->password),
            ]);

            // Send reset email with user's name
            if ($this->sendPasswordResetSuccessEmail($user->name, $resetRecord->email)) {
                // Delete the password reset record
                DB::table('password_resets')->where('email', $resetRecord->email)->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Password reset successfully.',
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to send password reset success email']);
            }

        }


        return response()->json(['success' => false, 'message' => 'Invalid user.']);
    }

    /**
     * Check if the given token is expired.
     *
     * @param  string  $createdAt
     * @return bool
     */
    private function tokenExpired($createdAt)
    {
        $expiresAt = strtotime($createdAt . '+1 day'); // Assuming tokens expire after 24 hours

        return now()->timestamp > $expiresAt;
    }

    private function sendPasswordResetSuccessEmail($userName, $email)
    {
        $forgotPasswordPageUrl = url("/auth/forget-password");

        try {
            // Using Laravel Mail facade to send the email
            Mail::to($email)->send(new PasswordResetSuccessMail($userName, $forgotPasswordPageUrl,$email));

            // Email sent successfully
            return true;
        } catch (\Exception $e) {
            // Log the error with more details
            Log::error('SendGrid Error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            // Email failed to send
            return false;
        }
    }

}
