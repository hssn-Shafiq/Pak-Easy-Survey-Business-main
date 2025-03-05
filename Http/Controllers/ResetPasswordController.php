<?php

// app/Http/Controllers/ResetPasswordController.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        $token = Str::random(60);
        PasswordReset::updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Send the token to the user via SMS or display it on the website
        return view('auth.passwords.reset', ['token' => $token]);
    }


    public function showResetForm($token)
    {
        $reset = DB::table('password_resets')->where('token', $token)->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
            return redirect()->route('password.request')->withErrors(['token' => 'Token invalid or expired']);
        }

        return view('auth.passwords.reset', ['token' => $token]);
    }




    public function resetPassword(Request $request, $token)
    {
        $reset = DB::table('password_resets')->where('token', $token)->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
            return redirect()->route('password.request')->withErrors(['token' => 'Token invalid or expired']);
        }

        $user = User::where('email', $reset->email)->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'User not found']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $user->email)->delete();

        return redirect()->route('login')->with('status', 'Password reset successfully');
    }
}
