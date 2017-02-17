<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function lawsuits(){

    	return $this->hasMany('App\Lawsuit');
    }

    public function types(){

    	return $this->belongsTo('App\Type', 'type');

  	}
}
