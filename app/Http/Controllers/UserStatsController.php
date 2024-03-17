<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatsController extends Controller
{
    public function index()
    {

        $userStats = UserStats::all();
        return view('user-stats.index', ['userStats' => $userStats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(UserStats $userStats)
    {

        $reviewEarnings = $userStats->user->reviews()->count() * 10;


        $totalEarnings = $userStats->earnings + $reviewEarnings;

        return view('user-stats.show', ['userStats' => $userStats, 'totalEarnings' => $totalEarnings]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, UserStats $userStats)
    {

        $userStats->update($request->all());
        return redirect()->route('user-stats.index');
    }

    public function destroy(UserStats $userStats)
    {

        $userStats->delete();
        return redirect()->route('user-stats.index');
    }


    public function updateEarnings(User $user)
    {
        $userStats = $user->stats;

        if ($userStats && Carbon::now()->diffInDays($user->created_at) <= 7) {
            $userStats->increment('earnings', 150);
            $referringUser = User::find($userStats->referral_by);
            if ($referringUser) {
                $referringUser->stats()->increment('earnings', 100);
            }
        }

        $reviewsEarnings = $user->reviews()->count() * 10;
        $userStats->increment('earnings', $reviewsEarnings);

        // Calculate and store review earnings
        $userStats->update(['review_earnings' => $reviewsEarnings]);

        // Calculate and store referral earnings
        $referralEarnings = $userStats->earnings - $reviewsEarnings;
        $userStats->update(['referral_earnings' => $referralEarnings]);

        return redirect()->route('user-stats.index');
    }




    public function resetEarnings(User $user)
    {

        $userStats = $user->stats;
        if ($userStats) {
            $userStats->update(['earnings' => 0]);
        }
        return redirect()->route('user-stats.index');
    }



    // Referral user



    public function referralUsers()
    {

        $referralCode = Auth::user()->own_referral_code;
        $allReferralUsers = User::where('referral_code', $referralCode)->get();
        return view('user-stats.referral-users', compact('allReferralUsers'));
    }


    public function showEarning()
    {
        $user = Auth::user();
        $userStats = UserStats::where('user_id', $user->id)->first();

        return view('front.customer', ['userStats' => $userStats]);
    }


    public function showLevel()
    {
        $user = Auth::user();
        $userStats = UserStats::where('user_id', $user->id)->first();

        if ($userStats) {
            $userLevel = $userStats->level;
        } else {
            $userLevel = null;
        }

        return view('front.customer', ['userStats' => $userStats, 'userLevel' => $userLevel]);
    }



    public function ShowgetTotalUsers()
    {
        $totalUsers = User::count();
        $users = User::all();
        return view('front.index', ['totalUsers' => $totalUsers, 'users' => $users]);
    }

    public function TotalUsers()
    {
        $totalUsers = User::count();
        $users = User::all();
        return view('front.admin', ['totalUsers' => $totalUsers, 'users' => $users]);
    }
}
