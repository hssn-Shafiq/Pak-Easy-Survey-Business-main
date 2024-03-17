<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
        return view('front.withdraw');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'bank' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:500'],
        ]);

        $withdrawal = new Withdrawal([
            'user_id' => Auth::id(),
            'bank' => $request->bank,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'amount' => $request->amount,
            'status' => "Pending",
        ]);
        $withdrawal->save();

        return redirect()->route('customer')->with('success', 'Withdrawal request submitted successfully.');
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


    // In your controller method
    public function approvedWithdrawals()
    {
        $users = User::whereHas('withdrawals', function ($query) {
            $query->where('status', 'Approved');
        })->get();

        return view('front.approved_withdrawals', ['users' => $users]);
    }
}
