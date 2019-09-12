<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class AdminVerificationController extends Controller
{

    public function index()
    {
        $datacar = Cars::where('verification_status', 2)->whereNotNull('verification_img')->get();
        return view('admin.verification', compact('datacar'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id){
        $datacar = Cars::where('car_id', $id)->first();
        return view('admin.cardetails', compact('datacar'));
    }

    public function approveVehicle($id){

        $datacar = Cars::where('car_id', $id)->first();
        $datacar->verification_status = '1';
        $datacar->save();
        return back()->with('message', 'Approved.');
    }

    public function denyVehicle($id){

        $datacar = Cars::where('car_id', $id)->first();
        $datacar->verification_status = '2';
        $datacar->verification_img='';
        $datacar->save();
        return back()->with('message', 'Vehicle Denied.');
    }
}
