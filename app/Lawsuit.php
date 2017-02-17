<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawsuit extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function clients(){

    	return $this->belongsTo('App\Client', 'client');

  	}

    public function older_clients(){

    	return $this->belongsTo('App\Client', 'older_client');

  	}

    public function opponents(){

    	return $this->belongsTo('App\Client', 'opponent');

  	}

    public function responsables(){

    	return $this->belongsTo('App\Client', 'responsable');

  	}

  	public function older_responsables(){

    	return $this->belongsTo('App\Client', 'older_responsable');

  	}

    public function attorneys(){

    	return $this->belongsTo('App\Client', 'attorney');

  	}

  	public function types(){

    	return $this->belongsTo('App\Type', 'type');

  	}

  	public function courts(){

    	return $this->belongsTo('App\Court', 'court');

  	}

  	public function older_courts(){

    	return $this->belongsTo('App\Court', 'older_court');

  	}
}