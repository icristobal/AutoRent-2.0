<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;
use App\Listings;
use DB;
use Auth;

class TxnHistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function user()
    {
        $uid = Auth::id();
        $data = DB::table('listings')
            ->join('transactions','transactions.listing_id', '=', 'listings.listing_id',)
            ->select('listings.*','transactions.*')
            ->where('transactions.status', '!=', 1)->orWhereNull('transactions.status')
            ->get();
        $current = DB::table('listings')
            ->join('transactions','transactions.listing_id', '=', 'listings.listing_id',)
            ->select('listings.*','transactions.*')
            ->where('transactions.status', 1)
            ->get();
        return view('users.my-transactions', compact('data','current'));
    }

    public function driver()
    {
        $uid = Auth::id();
        $listing = DB::table('listings')
            ->join('transactions','transactions.listing_id', '=', 'listings.listing_id',)
            ->select('listings.*','transactions.*')
            ->where('driver_id', '=', Auth::id())
            ->get();
        foreach($listing as $txn){
            if($txn->status == 1){
                $txn->status = "Accepted";
            }
            elseif($txn->status == 2){
                $txn->status = "Pending";
            }
            elseif($txn->status == 3){
                $txn->status = "Rejected";
            }
            elseif($txn->status == 4){
                $txn->status = "Done";
            }
            else{
                $txn->status = "Cancel";
            }
        }
        return view('drivers.my-transactions', compact('listing'));
    }

    public function cancelTxn($id) {
        $transaction = Transactions::where('txn_id', '=', $id)->first();
        if($transaction)
        {
            $transaction->status = '5';
            $transaction->save();
        }   
        return back()->with('message','Cancelled');    
    }
}
