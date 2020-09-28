<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];    //Disables mass assignment - enabled by default
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profileImage(){ //TODO: Fix image location
        $imagePath = ($this->image) ? $this->image: 'profile/0mNK2xzuZTma8T1nk6029jv4nGnuzJeq0HyS3Yzy.jpeg';
        return '/storage/' . $imagePath;
    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
