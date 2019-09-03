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
        $announcements = Announcements::where('user', '=', 1)->get();
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
            ->join('users','users.id', '=', 'listings.driver_id',)
            ->join('cars','cars.driver_id', '=', 'listings.driver_id')
            ->join('cities','cities.city_id','=','listings.city_id')
            ->select('listings.*','users.name','cars.*')
            ->where('listings.listing_status', '1')
            ->get();
        return view('findcar', compact('data'));
    }
}
