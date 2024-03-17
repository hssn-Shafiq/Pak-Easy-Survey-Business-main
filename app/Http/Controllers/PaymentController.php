<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function reject(Request $request, $id)
    {
        // Logic to reject the user with the given ID
        $user = User::findOrFail($id);
        $user->admin_approvel_status = 'Rejected';
        $user->save();

        return redirect()->back()->with('success', 'User rejected successfully');
    }
}
