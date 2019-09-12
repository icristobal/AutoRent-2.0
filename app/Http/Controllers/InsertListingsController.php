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
        $listings = "";
        $usedcar = Listings::where('driver_id', $uid)->get()->pluck('car_id')->toArray();
        $cars = Cars::where('driver_id', '=', $uid)
            ->where('verification_status', 1)
            ->whereNotIn('car_id', $usedcar)
            ->orWhereNull('car_id')
            ->get();
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

            $listings = Listings::updateOrCreate(
                [

                    'car_id'=>$car_id,
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
            $listings = Listings::updateOrCreate(
                [

                    'car_id'=>$car_id,
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
        $lastid = $listings->listing_id;
        $datalist = Listings::where('driver_id', Auth::id())->where('listing_id', $lastid)->first();
        return redirect()->route('showlist', ['id' => $lastid])->with('message', 'Updated Listing Details Successfully!');
    }
}
