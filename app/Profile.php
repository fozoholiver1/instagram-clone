<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){//we want to create the follow and un follow action using the profile_user migration
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'title', 'description', 'url','image',
    ];

    /*public function profileImage(){
        $imagepath=($this->image) ? $this->image : 'profile/BxQRWHQ9CafZDMKb2VOcLOf8zp2omHNAUPC47fSe.svg;
        return '/storage/'.$imagepath';
    }*/
}
