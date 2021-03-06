<?php

namespace App;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $attributes
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'lastname', 'avatar'
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


	/**
	 * get avatar
	 */
	public function getAvatarAttribute($avatar) {

		if($avatar){

		return asset("storage/img/avatars/{$this->id}.jpg");

		}

		return asset('img/avatar_default.png');


	}


	/**
     * set avatar
     */

    public function setAvatarAttribute($avatar) {

    	if(is_object($avatar)) {

    		$img = ImageManagerStatic::make($avatar)->fit(150,150)->stream('jpg',90);
			  Storage::put("public/img/avatars/{$this->id}.jpg", $img, 'public');
			  $this->attributes['avatar'] = true;


	    }
    }


	/**
	 * eloquent relation
	 * cards --> get the cards for the user
	 * posts --> get the posts for the user
	 */

	public function cards(){
		return $this->hasMany(Card::class);
	}

	public function posts(){
		return $this->hasMany(Post::class);
	}

}
