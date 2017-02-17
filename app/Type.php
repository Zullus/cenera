<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function lawsuits(){

    	return $this->hasMany('App\Lawsuit');
    }

        public function clients(){

    	return $this->hasMany('App\Client');
    }
}
