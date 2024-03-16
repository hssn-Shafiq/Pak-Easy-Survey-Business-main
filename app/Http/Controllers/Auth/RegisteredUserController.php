<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserStats;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'referral_code' => ['nullable', 'exists:' . User::class . ',own_referral_code'],
        ]);

        $referralCode = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'own_referral_code' => $referralCode,
            'referral_code' => $request->referral_code,

        ]);


        $userStats = UserStats::create([
            'user_id' => $user->id,
            'own_referral_code' => $referralCode,
        ]);


        if ($request->has('referral_code')) {
            $referringUser = User::where('own_referral_code', $request->referral_code)->first();
            if ($referringUser) {

                $userStats->update([
                    'referral_by' => $referringUser->id,
                ]);


                $referringUser->stats()->increment('earnings', 150);


                $referringUserParent = User::find($referringUser->referral_by);
                if ($referringUserParent) {

                    $referringUserParent->stats()->increment('earnings', 100);


                    $referringUserGrandParent = User::find($referringUserParent->referral_by);
                    if ($referringUserGrandParent) {

                        $referringUserGrandParent->stats()->increment('earnings', 50);
                    }
                }

                // Retrieve the current level of the user from the database
                $currentLevel = $referringUser->stats->level;

                // Increment the total number of referrals made by the user
                $referringUser->stats()->increment('total_referrals');

                // Check the total number of referrals made by the user against the conditions for level increment
                if ($referringUser->stats->total_referrals >= 0 && $referringUser->stats->total_referrals < 5) {
                    $level = 0;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 5 && $referringUser->stats->total_referrals < 6) {
                    $level = 1;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 6 && $referringUser->stats->total_referrals < 60) {
                    $level = 2;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 60 && $referringUser->stats->total_referrals < 100) {
                    $level = 3;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 100 && $referringUser->stats->total_referrals < 130) {
                    $level = 4;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 130 && $referringUser->stats->total_referrals < 160) {
                    $level = 5;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 160 && $referringUser->stats->total_referrals < 200) {
                    $level = 6;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 200 && $referringUser->stats->total_referrals < 250) {
                    $level = 7;
                    $currentLevel = $level;
                } else {
                    return ('Bass Kar Bhai ');
                }

                // Update the level of the user in the database
                $referringUser->stats()->update(['level' =>  $currentLevel]);
            }
        }

        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
