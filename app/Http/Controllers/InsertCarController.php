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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacar = DB::table('cars')
            ->join('users','users.id', '=', 'cars.driver_id')
            ->select('cars.*','users.id','users.name')
            ->where('driver_id','=', Auth::user()->id)
            ->first();

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
        $driver_id = Auth::id();

        if ($file != null) {
            $contents = $file->openFile()->fread($file->getSize());
            Cars::updateOrCreate(
            [
                'driver_id'=> $driver_id,
                'car_id'=> $car_id,
            ],
            [
                'car_id'=> $car_id,
                'make'=> $make,
                'model'=> $model,
                'type' => $type,
                'capacity' => $capacity,
                'image' => $contents,
                'driver_id' => $driver_id,
            ]
        );

        }else {
            Cars::updateOrCreate(
            [
                'driver_id'=> $driver_id,
                'car_id'=> $car_id,
            ],
            [
                'car_id'=> $car_id,
                'make'=> $make,
                'model'=> $model,
                'type' => $type,
                'capacity' => $capacity,
                'driver_id' => $driver_id,
            ]
        );
        }
        
       return redirect()->to('driver/insertcar')->with('message', 'Updated Car Details Successfully!');
    }
}
