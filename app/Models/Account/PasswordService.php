<?php

namespace App\Models\Account;


use App\Exceptions\PasswordException;
use App\Models\DB\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PasswordService
{
	/**
	 * @var PasswordReset
	 */
	private $dbModel;

	/**
	 * @var int Reset token lifetime in minutes
	 */
	private $resetTokenLifetime = 5;

	/**
	 * UserService constructor.
	 *
	 * @param PasswordReset $dbModel
	 */
	public function __construct(PasswordReset $dbModel)
	{

		$this->dbModel = $dbModel;

	}

	/**
	 * Create hash for password
	 *
	 * @param string $password
	 *
	 * @return string
	 */
	public function createHash($password) {

		return Hash::make(
			$password,
			[
				'rounds' => 12
			]
		);

	}

	/**
	 * Reset account password
	 *
	 * @param string $email
	 *
	 * @return PasswordReset
	 */
	public function reset($email)
	{

		$passwordReset = $this->dbModel->where('email', $email)->first();

		if (is_null($passwordReset)) {
			$passwordReset = $this->dbModel;
		}

		$passwordReset->email = $email;
		$passwordReset->token = $email . time();
		$passwordReset->created_at = Carbon::now()->format('Y-m-d H:i:s');
		$passwordReset->save();

		return $passwordReset;

	}

	/**
	 * Get user reset email
	 *
	 * @param string $resetToken
	 *
	 * @return string
	 * @throws PasswordException
	 */
	public function getResetEmail($resetToken)
	{

		$resetInfo = $this->dbModel->where('token', $resetToken)->first();

		if (is_null($resetInfo)) {
			throw new PasswordException('Reset token is incorrect.');
		}

		$isTokenExpired = Carbon::now()->diffInMinutes(new Carbon($resetInfo->created_at)) > $this->resetTokenLifetime;

		if ($isTokenExpired) {
			throw new PasswordException('Reset token is expired.');
		}

		$this->dbModel->where('email', $resetInfo->email)->delete();

		return $resetInfo->email;

	}

}
