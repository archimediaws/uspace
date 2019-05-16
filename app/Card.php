<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;


class Card extends Model
{
	protected $fillable = [
		'title', 'contenu', 'user_id', 'fimg', 'fimg_id'
	];


	/**
	 * set fimg_id
	 */
	public function setFimg_IdAttribute( $int ) {

		$this->attributes['fimg_id'] = $int;
	}

	/**
	 * get fimg_id
	 */
	public function getFimg_IdAttribute() {
		return $this->fimg_id;
	}


	/**
	 * set first image as fimg
	 */

	public function setFimgAttribute($fimg ) {

		if(is_object($fimg)) {

//			$img = ImageManagerStatic::make($fimg)->fit(150,150)->stream('jpg',90); /  fit(options)
			$img = ImageManagerStatic::make($fimg)->stream('jpg',90);
			$img_id = $this->getFimg_IdAttribute();
			Storage::put("public/img/cards/{$img_id}.jpg", $img, 'public');
			$this->attributes['fimg'] = true;


		}
	}

	/**
	 * get first image as fimg
	 * if exist return storage file of the image : userid-fimg_id.jpg else default img/default.jpg
	 */
	public function getFimgAttribute($fimg) {

		if($fimg){

			return asset("storage/img/cards/{$this->fimg_id}.jpg");

		}

		return asset('img/bg2.jpg');


	}







}
