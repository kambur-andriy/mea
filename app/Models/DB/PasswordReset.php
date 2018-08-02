<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PasswordReset extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email', 'token'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'created_at'
	];

	public $timestamps = false;

	/**
	 * Automaticaly bcrypt token field
	 *
	 * @param $value
	 */
	public function setTokenAttribute($value)
	{
		$this->attributes['token'] = $this->hash($value);
	}

	/**
	 * Hash token
	 */
	private function hash($value)
	{

		return Hash::make(
			$value,
			[
				'rounds' => 12
			]
		);

	}

}
