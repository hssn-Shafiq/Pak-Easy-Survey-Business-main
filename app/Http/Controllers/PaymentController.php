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

        // Check if user is pending approval
        if ($user && $user->admin_approvel_status === 'Pending') {
            $user->admin_approvel_status = 'Approved';
            $user->save();

            // Grant referral earnings to parent user if applicable
            if ($user->userStats && $user->userStats->referral_by) {
                $referringUser = User::find($user->userStats->referral_by);
                if ($referringUser && $referringUser->admin_approvel_status === 'Approved') {
                    $referringUser->userStats->increment('earnings', 150);

                    // Grant referral earnings to grandparent user if applicable
                    if ($referringUser->userStats->referral_by) {
                        $grandparentUser = User::find($referringUser->userStats->referral_by);
                        if ($grandparentUser && $grandparentUser->admin_approvel_status === 'Approved') {
                            $grandparentUser->userStats->increment('earnings', 50);

                            // Grant referral earnings to most grandparent user if applicable
                            if ($grandparentUser->userStats->referral_by) {
                                $mostGrandparentUser = User::find($grandparentUser->userStats->referral_by);
                                if ($mostGrandparentUser && $mostGrandparentUser->admin_approvel_status === 'Approved') {
                                    $mostGrandparentUser->userStats->increment('earnings', 20);
                                }
                            }
                        }
                    }
                }
            }

            return redirect()->route('front.customer', $user->id)->with('success', 'User approved successfully.');
        }

        // If user is not pending approval, redirect back or to an error page
        return redirect()->back()->with('error', 'User is not pending approval.');
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
        $user = User::findOrFail($id);

        // Check if user is pending approval
        if ($user->admin_approvel_status === 'Pending') {
            $user->admin_approvel_status = 'Rejected';
            $user->save();

            return redirect('admin')->back()->with('success', 'User rejected successfully');
        }

        // If user is not pending approval, redirect back or to an error page
        return redirect('admin')->with('error', 'User is not pending approval.');
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




    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Perform any additional checks or operations before deleting the user
        if ($user->admin_approvel_status !== 'Rejected') {
            return redirect()->back()->with('error', 'Cannot delete user that is not rejected.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
