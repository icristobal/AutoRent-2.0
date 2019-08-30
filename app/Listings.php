<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
	protected $primaryKey = 'listing_id';
    protected $fillable = [
        'listing_id','listing_title','rate','car_id','driver_id','notes','listing_status','name','make','model','type','capacity','listing_image','city_id',
    ];
}

