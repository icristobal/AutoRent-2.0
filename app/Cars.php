<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
	protected $primaryKey = 'car_id';
    protected $fillable = [
       'car_id','make','model','type','capacity','image','verification_img', 'verification_status'
       ,'driver_id', 'plate_number'
    ];
}
