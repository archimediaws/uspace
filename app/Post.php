<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Post extends Model
{
	protected $fillable = [
		'title', 'contenu', 'user_id', 'alias', 'category_id'
	];

	public function category(){
		return $this->belongsTo('App\Category', 'category_id');
	}


}


