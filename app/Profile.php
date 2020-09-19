<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];    //Disables mass assignment - enabled by default
    public function user(){
        return $this->belongsTo(User::class);
    }


}
