<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Referral;
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
            'referral_code' => ['required', 'exists:' . User::class . ',own_referral_code'],
            'bank_username' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'sender_number' => ['required', 'numeric', 'min:1000000000'],
            'TRX_number' => ['required', 'string', 'regex:/^[0-9]+$/'],
        ], [
            'bank_username.regex' => 'Bank username should contain only letters and spaces.',
            'TRX_number.regex' => 'TRX number should contain only digits.',
            'sender_number.min' => 'Sender number must be at least 10 digits.',
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
            'earnings' => 0,
        ]);



        
        if ($request->referral_code) {
            $referrer = User::where('own_referral_code', $request->referral_code)->first();

            if ($referrer) {
                $referral = Referral::create([
                    'referrer_id' => $referrer->id,
                    'referred_user_id' => $user->id,
                ]);
            }
        }



        if ($request->has('referral_code')) {
            $referringUser = User::where('own_referral_code', $request->referral_code)->first();
            if ($referringUser) {
                $userStats->update([
                    'referral_by' => $referringUser->id,
                ]);
            }
        }

        Auth::login($user);
        event(new Registered($user));

        // Grant referral earnings to parent user when the admin approves the new user
        if ($user->admin_approvel_status === 'Approved' && $userStats->referral_by) {
            $referringUser = User::find($userStats->referral_by);
            if ($referringUser && $referringUser->admin_approvel_status === 'Approved') {
                $referringUser->userStats->increment('earnings', 150); // Level 1: Referral by direct user

                // Check if there is a grandparent user
                if ($referringUser->referral_by) {
                    $grandparentUser = User::find($referringUser->referral_by);
                    if ($grandparentUser && $grandparentUser->admin_approvel_status === 'Approved') {
                        $grandparentUser->userStats->increment('earnings', 50); // Level 2: Referral by grandparent user

                        // Check if there is a most grandparent user
                        if ($grandparentUser->referral_by) {
                            $mostGrandparentUser = User::find($grandparentUser->referral_by);
                            if ($mostGrandparentUser && $mostGrandparentUser->admin_approvel_status === 'Approved' && $mostGrandparentUser->referral_by) {
                                $mostGrandparentUser->userStats->increment('earnings', 20); // Level 3: Referral by most grandparent user
                            }
                        }
                    }
                }
            }
        }

        // Update user's level based on total number of referrals
        $currentLevel = $referringUser->userStats->level;

        // Increment the total number of referrals made by the user
        $referringUser->userStats->increment('total_referrals');

        // Update the level of the user in the database based on the total number of referrals
        if ($referringUser->userStats->total_referrals >= 0 && $referringUser->userStats->total_referrals <= 9) {
            $level = 0;
        } else if ($referringUser->userStats->total_referrals >= 10 && $referringUser->userStats->total_referrals <= 29) {
            $level = 1;
        } else if ($referringUser->userStats->total_referrals >= 30 && $referringUser->userStats->total_referrals < 59) {
            $level = 2;
        } else if ($referringUser->userStats->total_referrals >= 60 && $referringUser->userStats->total_referrals < 99) {
            $level = 3;
        } else if ($referringUser->userStats->total_referrals >= 100 && $referringUser->userStats->total_referrals < 129) {
            $level = 4;
        } else if ($referringUser->userStats->total_referrals >= 130 && $referringUser->userStats->total_referrals < 159) {
            $level = 5;
        } else if ($referringUser->userStats->total_referrals >= 160 && $referringUser->userStats->total_referrals < 199) {
            $level = 6;
        } else if ($referringUser->userStats->total_referrals >= 200 && $referringUser->userStats->total_referrals < 249) {
            $level = 7;
        } else if ($referringUser->userStats->total_referrals >= 250 && $referringUser->userStats->total_referrals < 299) {
            $level = 8;
        } else if ($referringUser->userStats->total_referrals >= 300 && $referringUser->userStats->total_referrals < 399) {
            $level = 9;
        } else if ($referringUser->userStats->total_referrals >= 400 && $referringUser->userStats->total_referrals < 499) {
            $level = 10;
        } else if ($referringUser->userStats->total_referrals >= 500 && $referringUser->userStats->total_referrals < 599) {
            $level = 11;
        } else if ($referringUser->userStats->total_referrals >= 600) {
            $level = 12;
        }

        // Update the user's level in the database
        $referringUser->userStats->update(['level' => $level]);

        return redirect('/');
    }



    public function showRegistrationForm(Request $request)
    {
        $referralCode = $request->query('referral_code');
        return view('auth.register', ['referralCode' => $referralCode]);
    }
}
