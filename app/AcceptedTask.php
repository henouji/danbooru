<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedTask extends Model
{
    public $primaryKey = 'id';
    public $timestamps = true;

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
