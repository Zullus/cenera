<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function lawsuits(){

    	return $this->hasMany('App\Lawsuit');

  	}
}


