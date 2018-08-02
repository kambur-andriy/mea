<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'word', 'transcription', 'sound', 'description', 'translation'
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
	 * Return url for description page
	 *
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getUrlAttribute()
	{
		return url('/user/dictionary/view/' . $this->attributes['id']);
	}

	/**
	 * Return description formatted for HTML
	 *
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getDescriptionAttribute()
	{

		return join("\n", $this->getParts($this->attributes['description']));

	}

	/**
	 * Return translation formatted for HTML
	 *
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getTranslationAttribute()
	{

		return join("<br>", $this->getParts($this->attributes['translation']));

	}

	/**
	 * Return translation formatted as String
	 *
	 * @return \Illuminate\Contracts\Routing\UrlGenerator|string
	 */
	public function getStringTranslationAttribute()
	{

		return join(" *** ", $this->getParts($this->attributes['translation']));

	}

	/**
	 * Get separated words from field
	 *
	 * @param string $value
	 *
	 * @return array
	 */
	private function getParts($value) {
		
		$parts = explode("\n", $value);

		for($i=0; $i<count($parts); $i++) {
			$parts[$i] = trim($parts[$i]);
		}

		return $parts;
		
	}
}
