<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
	protected $primaryKey = 'txn_id';
    protected $fillable = ['txn_id','listing_id','passenger_id','rent_start','rent_end','pickup_address','dropoff_address','hasDriver','status'];
}
