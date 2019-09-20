<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Auth;
use App\User;
class AccountManageController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = 'http://127.0.0.1:8000/admin/accountmanage';

    public function index()
    {
        $accountlist = User::all();
        return view('admin.user-management', compact('accountlist'));
    }
    
    public function create()
    {
        $user="";
        return view('admin.createuser', compact('user'));
    }

    public function store(Request $request)
    {
        $user = User::updateOrCreate
        ([
            'id' => $request->userid,
            'email' => $request->email,
        ],
        [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'contact_number' =>$request->contact_number,
            'usertype'=> $request->role,
        ]);
        $user->save();
        $lastid = $user->id;
        $datalist = User::where('id', $lastid)->first();
        return redirect()->route('user-management.show', ['id' => $lastid])->with('message', 'Updated Listing Details Successfully!');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.createuser', compact('user'));
    }

    
    public function destroy($id)
    {
        $user = User::where('id', $id);

        $user->delete();
        return back()->with('message', 'user Deleted Successfully!');
    }
}
