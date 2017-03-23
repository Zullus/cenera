<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['id'];

    public function lawsuits(){

    	return $this->belongsTo('App\Lawsuit');
    }

    public function types(){

    	return $this->belongsTo('App\Type', 'type');

  	}
}
