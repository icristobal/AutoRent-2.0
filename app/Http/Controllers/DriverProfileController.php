<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Hash;
use App\User;

class DriverProfileController extends Controller
{
    public function index()
    {
    	$uid = Auth::id();
        $user = DB::table('users')
            ->select('*')
            ->where('id', $uid)
            ->get();
        return view('drivers.my-profile', compact('user'));
    }

    public function showChangePassword()
    {
    	return view('drivers.changepass');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->contact_number=$request->input('contact');

        $user->save();
        return back();
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
