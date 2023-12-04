<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\PasswordReset;
use App\Mail\PasswordReset as PasswordResetMail;

class ForgetPasswordController extends Controller
{
    public function show()
    {
        return view('auth.forgetPassword');
    }

    public function process(Request $request)
    {
        try {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
            }

            $email = $request->input('email');

            // Check if the email exists in the users table
            $user = DB::table('users')->where('email', $email)->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Email not found']);
            }

            // Generate a unique token
            $token = bin2hex(random_bytes(32));

            // Store the token in the password_resets table
            PasswordReset::updateOrCreate(
                ['email' => $email],
                ['token' => $token, 'created_at' => now()]
            );

            // Send reset email with user's name
            if ($this->sendResetEmail($user->name, $email, $token)) {
                return response()->json(['success' => true, 'message' => 'Password reset link sent successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to send reset email']);
            }
        } catch (\Exception $e) {
            // Log any unexpected exceptions
            Log::error('ForgetPasswordController Error: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return response()->json(['success' => false, 'message' => 'An unexpected error occurred']);
        }
    }

    private function sendResetEmail($userName, $email, $token)
    {
        $resetUrl = url("/auth/reset-password/{$token}");

        try {
            // Using Laravel Mail facade to send the email
            Mail::to($email)->send(new PasswordResetMail($userName, $resetUrl));

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
