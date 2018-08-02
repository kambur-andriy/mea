<?php

namespace App\Models\Account;


use App\Exceptions\AuthException;
use App\Http\Requests\Account\LogInAccount;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;


class AuthService
{

	/**
	 * @var Auth
	 */
	private $authService;

	/**
	 * AccountAuthService constructor.
	 *
	 * @param $authService
	 */
	public function __construct(AuthManager $authService)
	{

		$this->authService = $authService;

	}

	/**
	 * Log in user
	 *
	 * @param LogInAccount $request
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 * @throws AuthException
	 */
	public function logIn(LogInAccount $request)
	{

		$authCredentials = [
			'email' => $request->email,
			'password' => $request->password
		];

		$remember = $request->remember ?? true;

		$isAuthorized = $this->authService->attempt($authCredentials, $remember);

		if (!$isAuthorized) {
			throw new  AuthException('Login or password incorrect.');
		}

		return $this->user()->homePage;

	}

	/**
	 * Log out user
	 */
	public function logOut()
	{

		$this->authService->logout();

	}

	/**
	 * Return logged user
	 *
	 * @return \Illuminate\Contracts\Auth\Authenticatable|null
	 */
	public function user()
	{

		return $this->authService->user();

	}

	/**
	 * @return bool
	 */
	public function check()
	{
		return $this->authService->check();
	}

}
