<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function viewRequests()
    {
        $users = User::where('admin_approvel_status', 'Pending')->get();
        return view('admin.requests', ['users' => $users]);
    }

    public function approveUser($id)
    {
        $user = User::find($id);
        $user->admin_approvel_status = 'Approved';
        $user->save();

        return redirect()->route('front.customer', $user->id)->with('success', 'User approved successfully.');
    }



    public function customerPage($id)
    {
        $user = User::find($id);
        return view('customer.page', ['user' => $user]);
    }

    public function dashboard()
    {
        // Assuming you want to fetch some data to display on the dashboard
        $users = User::all();

        return view('front.process_payment', compact('users'));
    }


    //  for admin
    public function reject(Request $request, $id)
    {
        // Logic to reject the user with the given ID
        $user = User::findOrFail($id);
        $user->admin_approvel_status = 'Rejected';
        $user->save();

        return redirect()->back()->with('success', 'User rejected successfully');
    }
    // for  user


    public function showSendEarningForm()
    {
        return view('front.send-earning');
    }


    public function sendEarning(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'user_name' => 'required',
            'amount' => 'required|numeric',
            'message' => 'required',
        ]);

        $user = User::findOrFail($request->user_id);

        try {
            $user->earnings += $request->amount;
            $user->save();

            $user->messages()->create([
                'content' => $request->message,
            ]);

            return redirect()->route('admin')->with('success', 'Earning sent successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin')->with('error', 'Failed to send earning: ' . $e->getMessage());
        }
    }



    public function getUser(User $user)
    {
        return response()->json(['name' => $user->name]);
    }


    // for user  to the gift earning


    public function Userdashboard()
    {
        $user = Auth::user();
        return view('front.user-gift', ['user' => $user]);
    }


    public function giftedUsers()
    {
        $giftedUsers = User::where('earnings', '>', 0)->get();
        return view('front.show_earnings', ['giftedUsers' => $giftedUsers]);
    }
}
