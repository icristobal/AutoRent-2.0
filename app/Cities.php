<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
	protected $primaryKey = 'city_id';
    protected $fillable = ['city_id','city',
    ];
}
