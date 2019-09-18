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

        $Listinglist = DB::table('listings')
        ->join('users','users.id','=','listings.driver_id')
        ->join('cars','cars.car_id','=','listings.car_id')
        ->select('listings.*','cars.*')
        ->where('cars.verification_status', '=' , 1)
        ->where('cars.availability', '=', 2)
    	->where('listings.driver_id','=',Auth::id())
    	->get();
    	return view('drivers.my-listings',compact('Listinglist'));
	}
	
	public function show($id)
    {
        $cities = Cities::select('*')->get();
        $uid = Auth::id();
        $listings = Listings::where('listing_id', '=', $id)->first();
        $cars = Cars::where('driver_id', '=', $uid)->where('verification_status', 1)->get();
        return view('drivers.insertlist', compact('listings', 'cities', 'cars'));
    }

    public function deletelist($id)
    {
        $Listinglist = Listings::where('listing_id', $id)->delete();
        $available = Cars::find($id);
        $available->availability = '2';
        $available->save();
        return back()->with('message', 'Listing Deleted Successfully!');
    }
}
