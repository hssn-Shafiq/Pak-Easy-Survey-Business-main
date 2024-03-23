<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatsController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('query');

        $userStats = UserStats::query()
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('user_id', 'like', "%$searchQuery%")
                    ->orWhereHas('user', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', "%$searchQuery%");
                    })
                    ->orWhere('earnings', 'like', "%$searchQuery%")
                    ->orWhere('level', 'like', "%$searchQuery%")
                    ->orWhere('total_referrals', 'like', "%$searchQuery%")
                    ->orWhere('created_at', 'like', "%$searchQuery%");
            })
            ->get();

        return view('user-stats.index', compact('userStats'));
    }


    // public function search(Request $request)
    // {
    //     $searchQuery = $request->input('query');

    //     $userStats = UserStats::query()
    //         ->when($searchQuery, function ($query) use ($searchQuery) {
    //             return $query->orWhere('earnings', 'like', "%$searchQuery%")
    //             ->orWhere('created_at', 'like', "%$searchQuery%");
    //         })
    //         ->get();

    //     return view('user-stats.index', compact('userStats'));
    // }




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

        // Update earnings for new users within 7 days
        if ($userStats && Carbon::now()->diffInDays($user->created_at) <= 7) {
            $userStats->increment('earnings', 150); // User gets 150 earnings
            $referringUser = User::find($userStats->referral_by);
            if ($referringUser) {
                $referringUser->stats()->increment('earnings', 100); // Referrer gets 100 earnings
            }
        }

        // Calculate earnings from reviews
        $reviewsEarnings = $user->reviews()->count() * 10; // Each review is worth 10 earnings
        $userStats->increment('earnings', $reviewsEarnings); // Add review earnings to total earnings

        // Calculate and store review earnings
        $userStats->update(['review_earnings' => $reviewsEarnings]);

        // Calculate and store referral earnings
        $referralEarnings = $userStats->earnings - $reviewsEarnings; // Remaining earnings are from referrals
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


    // public function showEarning()
    // {
    //     $user = Auth::user();
    //     $userStats = UserStats::where('user_id', $user->id)->first();

    //     $userEarnings = $user->earnings;
    //     $userStatsEarnings =$userStats->earnings ;

    //     $totalEarnings = $userEarnings + $userStatsEarnings;

    //     return view('front.customer', compact('totalEarnings'));
    // }

    public function showEarning()
    {
        $user = Auth::user();
        $userStats = UserStats::where('user_id', $user->id)->first();
    
        // Fetch user's earnings and user stats earnings
        $userEarnings = $user->earnings;
        $userStatsEarnings = $userStats ? $userStats->earnings : 0; // Handle the case where user stats might not exist
    
        // Calculate total earnings by adding both earnings
        $totalEarnings = $userEarnings + $userStatsEarnings;
    
        return view('front.customer', compact('totalEarnings'));
    }
    
    public function showLevel()
    {
        $user = Auth::user();
        $userStats = UserStats::where('user_id', $user->id)->first();

        $userLevel = $userStats ? $userStats->level : null;
        $totalEarnings = $userStats ? $userStats->earnings : null;

        return view('front.customer', compact('totalEarnings', 'userLevel'));
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
