<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'word', 'translation'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'created_at', 'updated_at'
	];

	/**
	 * @var array Type Casts
	 */
	protected $casts = [
		'translation' => 'array',
	];

	/**
	 * Set Translation attribute
	 * 
	 * @param $value
	 */
	public function setTranslationAttribute($value)
	{

		$this->attributes['translation'] = json_encode($value);

	}	
}
