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
            'bank_username' => ['required', 'string'],
            'sender_number' => ['required', 'numeric'],
            'TRX_number' => ['required', 'string'],

        ]);

        $referralCode = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'referral_code' => $request->referral_code,
            'own_referral_code' => $referralCode,
            'bank_username' => $request->bank_username,
            'sender_number' => $request->sender_number,
            'TRX_number' => $request->TRX_number,
            'payment_status' => 'Pending',
            'payment_date_time' => $request->payment_date_time,
            'admin_approvel_status' => 'Pending',
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


                // Assuming $referringUser contains the newly registered user

                // Get the user stats of the referring user
                // Assuming $referringUser contains the newly registered user

                // Get the user stats of the referring user
                $userStats = UserStats::where('referral_by', $referringUser->id)->first();

                // If user stats exist
                if ($userStats) {
                    // Give 150 rupees to the parent of the newly registered user
                    $referringUserParentStats = UserStats::where('user_id', $userStats->referral_by)->first();
                    if ($referringUserParentStats) {
                        $referringUserParentStats->increment('earnings', 150);

                        // Give 50 rupees to the parent's parent
                        $referringUserGrandParentStats = UserStats::where('user_id', $referringUserParentStats->referral_by)->first();
                        if ($referringUserGrandParentStats) {
                            $referringUserGrandParentStats->increment('earnings', 50);

                            // Give 20 rupees to any of the grandparent's referrals
                            $grandParentReferralStats = UserStats::where('referral_by', $referringUserGrandParentStats->user_id)->first();
                            if ($grandParentReferralStats) {
                                $grandParentReferralStats->increment('earnings', 20);
                            }
                        }
                    }
                }


                // Retrieve the current level of the user from the database
                $currentLevel = $referringUser->stats->level;

                // Increment the total number of referrals made by the user
                $referringUser->stats()->increment('total_referrals');

                // Check the total number of referrals made by the user against the conditions for level increment
                if ($referringUser->stats->total_referrals >= 0 && $referringUser->stats->total_referrals <= 9) {
                    $level = 0;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 10 && $referringUser->stats->total_referrals <= 29) {
                    $level = 1;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 30 && $referringUser->stats->total_referrals < 59) {
                    $level = 2;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 60 && $referringUser->stats->total_referrals < 99) {
                    $level = 3;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 100 && $referringUser->stats->total_referrals < 129) {
                    $level = 4;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 130 && $referringUser->stats->total_referrals < 159) {
                    $level = 5;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 160 && $referringUser->stats->total_referrals < 199) {
                    $level = 6;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 200 && $referringUser->stats->total_referrals < 249) {
                    $level = 7;
                    $currentLevel = $level;
                } 
                else if ($referringUser->stats->total_referrals >= 250 && $referringUser->stats->total_referrals < 299) {
                    $level = 8;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 300 && $referringUser->stats->total_referrals < 399) {
                    $level = 9;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 400 && $referringUser->stats->total_referrals < 499) {
                    $level = 10;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 500 && $referringUser->stats->total_referrals < 599) {
                    $level = 11;
                    $currentLevel = $level;
                } else if ($referringUser->stats->total_referrals >= 600 ) {
                    $level = 12;
                    $currentLevel = $level;
                } 
                
                // Update the level of the user in the database
                $referringUser->stats()->update(['level' =>  $currentLevel]);
            }
        }

        Auth::login($user);
        event(new Registered($user));
        return redirect('/');
    }
}
