<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ListingListController extends Controller
{
    public function index()
    {
    	$Listinglist = DB::table('listings')
    	->select('*')
    	->where('driver_id','=',Auth::id())
    	->get();
    	
    	return view('drivers.listinglist',compact('Listinglist'));
    }
}
