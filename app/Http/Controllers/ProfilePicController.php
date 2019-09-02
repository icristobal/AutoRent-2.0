<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Eloquent;
use App\User;
use Auth;

class ProfilePicController extends Controller
{
    public function driverShow() {
        $uid = Auth::id();
        $me = User::where('id', $uid)->first();
        return view('drivers.profilepic', compact('me'));       
    }

    public function userShow() {
        $uid = Auth::id();
        $me = User::where('id', $uid)->first();
        return view('users.profilepic', compact('me'));       
    }

    public function updatepic(Request $request) {
        $uid = Auth::id();
        $file = $request->file('image');
        $contents = $file->openFile()->fread($file->getSize());

        User::updateOrCreate(
            [
                 'id'=>$uid,
             ],
             [
                 'display_image'=>$contents,
            ]
        );
        return back()->with('success', 'Updated profile picture!');     
    }
}
