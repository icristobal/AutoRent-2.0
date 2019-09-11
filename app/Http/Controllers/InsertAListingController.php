<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Cities;
use App\Cars;
use App\Listings;

class InsertAListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth::id();
        $cities = Cities::select('*')->get();
        $cars = Cars::where('driver_id', '=', $uid)->where('verification_status', 1)->get();
        return view('drivers.insertalisting',compact('cars','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $uid = Auth::id();
        $car_id = $request->get('car_id');
        $listing_id = $request->get('listing_id');

        $file = $request->file('image');
        $listing_title = $request->get('listing_title');
        $rate = $request->get('rate');
        $city_id = $request->get('city_id');
        $notes = $request->get('notes');
        $listing_status = 1;

        if ($file != null) {
            $contents = $file->openFile()->fread($file->getSize());

            Listings::updateOrCreate(
               [
                    
                    'listing_id'=>$listing_id,
                ],
                [
                    'listing_title'=>$listing_title,
                    'rate'=>$rate,
                    'notes'=>$notes,
                    'city_id'=>$city_id,
                    'car_id'=>$car_id,
                    'listing_image'=>$contents,
                    'listing_status'=>$listing_status, 
                    'driver_id'=>$uid
            ]);
           
        } else{
            Listings::updateOrCreate(
               [
                    
                    'listing_id'=>$listing_id,
                ],
                [
                    'driver_id'=>$uid,
                    'listing_title'=>$listing_title,
                    'rate'=>$rate,
                    'notes'=>$notes,
                    'car_id'=>$car_id,
                    'city_id'=>$city_id,
                    'listing_status'=>$listing_status, 
            ]);
          }
          return redirect('driver/ListingList')->with('success','Successfully Updated Listing!');
            
    }
}
