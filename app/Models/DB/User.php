<?php

namespace App\Models\DB;


use App\Facades\AccountPassword;
use App\Facades\AccountRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{

	use Notifiable, SoftDeletes;

	/**
	 * @var string $homePage
	 */
	private $homePage = '/user';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email', 'password'
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
	 * Return user home page
	 *
	 * @return string
	 */
	public function getHomePageAttribute()
	{
		return $this->homePage;
	}

}
