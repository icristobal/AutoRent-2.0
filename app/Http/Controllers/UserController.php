<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Announcements;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcements = Announcements::where('user', '=', 1)->orderBy('created_at','DESC')->get();
        return view('users.home', compact('announcements'));
    }

    public function aboutus()
    {
        return view('users.about-us');
    }

    public function contactus()
    {
        return view('users.contact-us');
    }

    public function findcar()
    {
        $data = DB::table('listings')
        ->join('cars','cars.car_id','=','listings.car_id')
        ->join('cities','cities.city_id','=','listings.city_id')
        ->join('users','users.id','=','listings.driver_id')
        ->select('listings.*','cars.*','users.*')
        ->where('listing_status', 1)->get();
        return view('findcar', compact('data'));
    }
}
