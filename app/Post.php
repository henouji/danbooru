<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Change Table Name
    // protected $table = 'tasks';
    // Change PKey
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function reports(){
        return $this->hasMany('App\Report');
    }
}
