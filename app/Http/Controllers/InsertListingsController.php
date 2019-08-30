<?php

namespace App\Http\Controllers;

use App\User;
use App\Cities;
use App\Listings;
use App\Cars;
use Illuminate\Http\Request;
use Auth;
use DB;

class InsertListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::select('*')->get();
        $uid = Auth::id();
        $listings = Listings::where('driver_id', '=', $uid)->first();
        $cars = Cars::where('driver_id', '=', $uid)->first();
        return view('drivers.insertlist', compact('listings', 'cities', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = Auth::id();
        $car_id = Cars::where('driver_id', '=', $uid)->value('car_id');

        $file = $request->file('image');
        $listing_title = $request->get('listing_title');
        $rate = $request->get('rate');
        $city_id = $request->get('city_id');
        $notes = $request->get('notes');
        $listing_status = 0;

        if ($file != null) {
            $contents = $file->openFile()->fread($file->getSize());

            Listings::updateOrCreate(
               [
                    'driver_id'=>$uid,
                ],
                [
                    'listing_title'=>$listing_title,
                    'rate'=>$rate,
                    'notes'=>$notes,
                    'city_id'=>$city_id,
                    'car_id'=>$car_id,
                    'listing_image'=>$contents,
                    'listing_status'=>$listing_status, 
            ]);
           
        } else{
            Listings::updateOrCreate(
               [
                    'driver_id'=>$uid,
                ],
                [
                    'listing_title'=>$listing_title,
                    'rate'=>$rate,
                    'notes'=>$notes,
                    'car_id'=>$car_id,
                    'city_id'=>$city_id,
                    'listing_status'=>$listing_status, 
            ]);
          
        }
         return redirect('driver/insertlist')->with('success','Successful');
    }
}
