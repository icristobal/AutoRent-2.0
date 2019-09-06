<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Eloquent;   
use App\Transactions;
use App\Listings;
use DB;
use Auth;

class DriverJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $me = Auth::id();
        $cjob = DB::table('listings')
            ->join('transactions','transactions.listing_id', '=', 'listings.listing_id')
            ->join('users', 'users.id', '=', 'transactions.passenger_id')
            ->select('users.*','listings.*','transactions.*')
            ->where('driver_id','=', Auth::user()->id)
            ->where('transactions.status', 1)
            ->get();
            if($cjob->isEmpty()){
                $pending = "1";
            }
            else{
                $pending = "0";
            }
        $pjob = DB::table('listings')
            ->join('transactions','transactions.listing_id', '=', 'listings.listing_id')
            ->join('users', 'users.id', '=', 'transactions.passenger_id')
            ->select('users.*','listings.*','transactions.*')
            ->where('driver_id','=', Auth::user()->id)
            ->where('transactions.status', 2)
            ->get();

        foreach($pjob as $pjb){
            if($pjb->hasDriver == 1){
                $pjb->hasDriver = "Yes";
            }
            else{
                $pjb->hasDriver = "No";
            }
        }
        return view('drivers.my-jobs', compact('cjob', 'pjob','pending')); 
    }

    public function postApprove($id) {
        $transaction = Transactions::where('txn_id', '=', $id)->first();
        $listing = Listings::where('driver_id', '=', Auth::id())->first();
        if($transaction)
        {
            $listing->listing_status = '2';
            $transaction->status = '1';
            $transaction->save();
            $listing->save();
        }
        return back()->with('message','Accepted Job');       
    }

    public function postReject($id) {
        $transaction = Transactions::where('txn_id', '=', $id)->first();
        $listing = Listings::where('driver_id', '=', Auth::id())->first();
        if($transaction)
        {
            $listing->listing_status = '2';
            $transaction->status = '3';
            $transaction->save();
            $listing->save();
        }   
        return back()->with('message','Rejected Job');    
    }

    public function postDone($id) {
        $listing = Listings::where('driver_id', '=', Auth::id())->first();
        $transaction = Transactions::where('txn_id', '=', $id)->first();
        if($transaction)
        {
            $listing->listing_status = '2';
            $transaction->status = '4';
            $transaction->save();
            $listing->save();
        }   
        return back()->with('message','Job marked as DONE');    
    }

    public function postCancel($id) {
        $listing = Listings::where('driver_id', '=', Auth::id())->first();
        $transaction = Transactions::where('txn_id', '=', $id)->first();
        if($transaction)
        {
            $listing->listing_status = '2';
            $transaction->status = '5';
            $transaction->save();
            $listing->save();
        }   
        return back()->with('message','Cancelled Job');
    }
}
