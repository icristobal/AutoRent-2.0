<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Announcements;
use Auth;
use DB;

class DriverController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $announcements = Announcements::where('user', '=', 2)->orderBy('created_at','DESC')->get();
        return view('drivers.home', compact('announcements'));
    }
}
