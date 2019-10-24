<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC') ;
    }


    protected static function boot()//we want to create a default profile for our users
    {
        parent::boot();
        static::created(function ($user){
            $user->profile()->create([

                'title'=>$user->username,
                'description'=>$user->username,
                'url'=>$user->username,
                'image'=>'profile/BxQRWHQ9CafZDMKb2VOcLOf8zp2omHNAUPC47fSe.svg',
            ]);
            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function following(){//we want to create the follow and un follow action using the profile_user migration
        return $this->belongsToMany(Profile::class);
    }

}
