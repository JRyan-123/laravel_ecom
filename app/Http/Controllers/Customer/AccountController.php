<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account()
    {   
        $user = auth()->user();
        

        return view('customer.profile.account', compact('user'));
    }
    // end method

    public function personal_settings(Request $request)
    {
        $user = auth()->user();

        $validate_info = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'. $user->id,
        ]);

        $user->update($validate_info);

        return back()->with('success', 'profile updated!');

    }
    // end method


    public function change_password(Request $request)
    {
        $user = auth()->user();

        $validate_info = $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed|min:4',
        ]);


        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'password updated!');
    }
}
