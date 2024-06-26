<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserStats;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class withdrawalcontroller extends Controller
{
    //


    public function userindex()
    {
        $userWithdrawals = Withdrawal::where('user_id', auth()->id())->get();
        return view('front.user_withdraw_check', compact('userWithdrawals'));
    }
    public function index()
    {
        $withdrawals = Withdrawal::where('status', 'Pending')->get();
        return view('front.admin_withdraw', ['withdrawals' => $withdrawals]);
    }



    public function create()
    {
        return view('user-stats.referral-users');
    }





    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $totalAmountRequired = 150; // Minimum amount required for withdrawal

        // Get the total earnings from both User and UserStats
        $totalEarnings = $user->earnings;
        $userStats = UserStats::where('user_id', $user->id)->first();
        if ($userStats) {
            $totalEarnings += $userStats->earnings;
        }
        // dd($totalEarnings);
        if ($totalEarnings >= $totalAmountRequired) {
            $request->validate([
                'bank' => ['required', 'string'],
                'account_number' => ['required', 'string'],
                'account_name' => ['required', 'string'],
                'amount' => ['required', 'numeric', 'min:' . $totalAmountRequired],
            ]);

            // Check if withdrawal amount is greater than total earnings
            $withdrawalAmount = $request->amount;
            if ($withdrawalAmount > $totalEarnings) {
                return redirect()->route('referral-users')->with('error', 'You do not have enough earnings for withdrawal. Please earn more to proceed.');
            }

            // Deduct the withdrawal amount from user's earnings
            $withdrawalAmountToDeduct = min($withdrawalAmount, $user->earnings);
            $user->earnings -= $withdrawalAmountToDeduct;
            $user->save();

            // Deduct the remaining withdrawal amount from UserStats earnings if UserStats exist
            if ($userStats) {
                $remainingWithdrawalAmount = $withdrawalAmount - $withdrawalAmountToDeduct;
                $withdrawalAmountToDeductFromUserStats = min($remainingWithdrawalAmount, $userStats->earnings);
                $userStats->earnings -= $withdrawalAmountToDeductFromUserStats;
                $userStats->save();
            }

            $withdrawal = new Withdrawal([
                'user_id' => Auth::id(),
                'bank' => $request->bank,
                'account_number' => $request->account_number,
                'account_name' => $request->account_name,
                'amount' => $withdrawalAmount,
                'status' => "Pending",
            ]);
            $withdrawal->save();

            return redirect()->route('referral-users')->with('success', 'Withdrawal request submitted successfully.');
        } else {
            return redirect()->route('referral-users')->with('error', 'You do not have enough earnings for withdrawal. Please earn more to proceed.');
        }
    }


    public function updateWithdrawal(Request $request, Withdrawal $withdrawal)
    {
        $user = User::find($withdrawal->user_id);
        $userStats = UserStats::where('user_id', $withdrawal->user_id)->first();

        if ($request->status == 'rejected') {
            // Refund the amount back to user's earnings and UserStats earnings
            $user->earnings += $withdrawal->amount;
            $user->save();

            if ($userStats) {
                $userStats->earnings += $withdrawal->amount;
                $userStats->save();
            }
        }

        // Update the withdrawal status
        $withdrawal->status = $request->status;
        $withdrawal->save();

        return redirect()->back()->with('success', 'Withdrawal status updated successfully.');
    }










    public function approve(Request $request, Withdrawal $withdrawal): RedirectResponse
    {
        $withdrawal->status = 'Approved';
        $withdrawal->save();

        return redirect()->route('admin.withdrawals.index')->with('success', 'Withdrawal request approved.');
    }

    public function reject(Request $request, Withdrawal $withdrawal): RedirectResponse
    {
        $withdrawal->status = 'Rejected';
        $withdrawal->save();

        return redirect()->route('admin.withdrawals.index')->with('success', 'Withdrawal request rejected.');
    }


    //   approved withdaraw
    public function approvedWithdrawals()
    {
        $users = User::whereHas('withdrawals', function ($query) {
            $query->where('status', 'Approved');
        })->get();

        return view('front.approved_withdrawals', ['users' => $users]);
    }

    //  rejected withdral
    public function rejectedWithdrawals()
    {
        $users = User::whereHas('withdrawals', function ($query) {
            $query->where('status', 'Rejected');
        })->get();

        return view('front.rejected_withdrawals', ['users' => $users]);
    }


    // see the user total amount  how much take

    public function userWithdrawals()
    {
        $user = Auth::user();

        $userWithdrawals = $user->withdrawals()->orderBy('created_at', 'desc')->get();

        return view('user-stats.user_withdrawals', ['userWithdrawals' => $userWithdrawals]);
    }




}
