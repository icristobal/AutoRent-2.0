<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Listings;
use App\Cars;
use App\User;
use App\Cities;

class UserSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cities::all();
        return view('users.search',compact('data'));
    }

    public function Search(Request $request)
    {
        $q = $request->get('q');
        $r = $request->get('r');
        $data = DB::table('listings')
        ->join('users','users.id', '=', 'listings.driver_id')
        ->join('cars','cars.driver_id', '=', 'listings.driver_id')
        ->join('cities','cities.city_id','=','listings.city_id')
        ->where('cars.type','like','%'.$r.'%')
        ->where('cities.city','like','%'.$q.'%')
        ->get();
        return view('users.s-result',compact('data'));
    }
}
