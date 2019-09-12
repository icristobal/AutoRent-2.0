<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Cars;
use App\Cities;
use App\Listings;
class ListingListController extends Controller
{
    public function index()
    {
        $uid = Auth::id();
    	$Listinglist = Listings::where('driver_id','=',Auth::id())
    	->get();
        $cars = Cars::where('driver_id', '=', $uid)->where('verification_status', 1)->get();
    	return view('drivers.my-listings',compact('Listinglist','cars'));
	}
	
	public function show($id)
    {
        $cities = Cities::select('*')->get();
        $uid = Auth::id();
        $listings = Listings::where('listing_id', '=', $id)->first();
        $cars = Cars::where('driver_id', '=', $uid)->where('verification_status', 1)->get();
        return view('drivers.insertlist', compact('listings', 'cities', 'cars'));
    }
}
