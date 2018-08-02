<?php

namespace App\Models\Account;


use App\Exceptions\MailException;
use App\Exceptions\PasswordException;
use App\Exceptions\UserException;
use App\Http\Requests\Account\CreateAccount;
use App\Http\Requests\Account\ResetPassword;
use App\Http\Requests\Account\UpdatePassword;
use App\Models\DB\PasswordReset;
use App\Models\DB\User;
use App\Models\Mail\MailService;
use Illuminate\Support\Facades\App;


class UserService
{

	/**
	 * @var User
	 */
	private $dbModel;

	/**
	 * @var PasswordService
	 */
	private $passwordService;

	/**
	 * UserService constructor.
	 *
	 * @param User $dbModel
	 * @param PasswordService $passwordService
	 */
	public function __construct(User $dbModel, PasswordService $passwordService)
	{

		$this->dbModel = $dbModel;
		$this->passwordService = $passwordService;

	}

	/**
	 * Create user
	 *
	 * @param CreateAccount $request
	 *
	 * @return User
	 */
	public function create(CreateAccount $request)
	{

		return $this->createUser(
			[
				'email' => $request->email,
				'password' => $this->passwordService->createHash($request->password),
			]
		);

	}

	/**
	 * Reset password
	 *
	 * @param ResetPassword $request
	 *
	 * @return PasswordReset|null
	 */
	public function resetPassword(ResetPassword $request)
	{

		$email = $request->email;

		$userExist = $this->dbModel->where('email', $email)->exists();

		if ($userExist) {

			return $this->passwordService->reset($email);

		}

		return null;

	}

	/**
	 * Update password
	 *
	 * @param UpdatePassword $request
	 *
	 * @return void
	 * @throws UserException|PasswordException
	 */
	public function updatePassword(UpdatePassword $request)
	{

		$email = $this->passwordService->getResetEmail($request->token);

		$user = $this->dbModel::where('email', $email)->first();

		$this->updateUser(
			$user,
			[
				'password' => $this->passwordService->createHash($request->password)
			]
		);

	}

	/**
	 * Create user account
	 *
	 * @param array $credentials
	 *
	 * @return User
	 */
	private function createUser(array $credentials)
	{

		return $this->dbModel->create($credentials);

	}

	/**
	 * Update user account
	 *
	 * @param User $user
	 * @param array $fieldsToUpdate
	 *
	 * @return User
	 * @throws UserException
	 */
	private function updateUser(User $user, array $fieldsToUpdate)
	{

		$this->checkUser($user);

		foreach ($fieldsToUpdate as $field => $value) {

			$user->{$field} = $value;

		}

		$user->save();

		return $user;

	}

	/**
	 * Check if user exist
	 *
	 * @param mixed $user
	 *
	 * @return void
	 * @throws UserException
	 */
	private function checkUser($user)
	{

		if (is_null(optional($user)->id)) {
			throw new UserException('User not found');
		}

	}

}
