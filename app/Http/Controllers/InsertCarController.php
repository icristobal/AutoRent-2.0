<?php

namespace App\Http\Controllers;

use App\Listings;
use App\Cars;
use App\Users;
use App\Cities;
use App\InsertListings;
use Illuminate\Http\Request;
use Auth;
use DB;
use Image;


class InsertCarController extends Controller
{
    public function mycars()
    {
        $datacar = Cars::where('driver_id', Auth::id())->get();
        foreach($datacar as $car){
            if($car->type == 1){
                $car->type = "Sedan";
            }
            else if($car->type == 2){
                $car->type = "AUV";
            }
            else{
                $car->type = "Van";
            }
        }
        foreach($datacar as $car2){
            if($car2->verification_status == 1){
                $car2->verification_status = "Verified";
            }
            else{
                $car2->verification_status = "Unverified";
            }
        }
        return view('drivers.my-cars', compact('datacar'));
    }

    public function getcar($id)
    {
        $datacar = Cars::where('driver_id', Auth::id())->where('car_id', $id)->first();
        return view('drivers.insertcar', compact('datacar'));
    }

    public function verify(Request $request)
    {
        $file = $request->file('verification_img');
        $contents = $file->openFile()->fread($file->getSize());
        $mycar = Cars::find($request->get('car_id'));
        $mycar->verification_img = $contents;
        $mycar->save();

        return back()->with('message', 'Successfully submitted verification. Please wait for the verification of the Administrators. Thank You!');
    }

    public function showcar($id)
    {
        $datacar = Cars::where('driver_id', Auth::id())->where('car_id', $id)->first();
        return view('drivers.insertcar', compact('datacar'));
    }

    public function deletecar($id)
    {
        $datacar = Cars::where('driver_id', Auth::id())->where('car_id', $id)->delete();
        return back()->with('message', 'Car Deleted Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacar = "";
        return view('drivers.insertcar', compact('datacar'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $car_id = $request->get('car_id');
        $make = $request->get('make');
        $model = $request->get('model');
        $type = $request->get('type');
        $capacity = $request->get('capacity');
        $plate = $request->get('plate_num');
        $driver_id = Auth::id();

        if ($file != null) {
            $contents = $file->openFile()->fread($file->getSize());
            $cars = Cars::updateOrCreate(
            [
                'driver_id'=> $driver_id,
                'car_id'=> $car_id,
            ],
            [
                'car_id'=> $car_id,
                'make'=> $make,
                'model'=> $model,
                'type' => $type,
                'plate_number' => $plate,
                'capacity' => $capacity,
                'image' => $contents,
                'driver_id' => $driver_id,
                'verification_status' => '2',
            ]
        );

        }else {
            $cars = Cars::updateOrCreate(
            [
                'driver_id'=> $driver_id,
                'car_id'=> $car_id,
            ],
            [
                'car_id'=> $car_id,
                'make'=> $make,
                'model'=> $model,
                'type' => $type,
                'plate_number' => $plate,
                'capacity' => $capacity,
                'verification_status' => '2',
            ]
        );
        }
        $lastid = $cars->car_id;
        $datacar = Cars::where('driver_id', Auth::id())->where('car_id', $lastid)->first();
        return redirect()->route('viewcar', ['id' => $lastid])->with('message', 'Updated Car Details Successfully!');
    }
}
