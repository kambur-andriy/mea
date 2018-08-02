<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CreateAccount;
use App\Http\Requests\Account\LogInAccount;
use App\Http\Requests\Account\ResetPassword;
use App\Http\Requests\Account\UpdatePassword;
use App\Models\Account\AuthService;
use App\Models\Account\ResetPasswordService;
use App\Models\Account\UserService;
use App\Models\DB\PasswordReset;
use Illuminate\Support\Facades\App;

class AccountController extends Controller
{

	/**
	 * Create account
	 *
	 * @param CreateAccount $request
	 *
	 * @return JSON
	 */
	public function create(CreateAccount $request)
	{

		$userService = App::make(UserService::class);

		$user = $userService->create($request);

		$mailService = App::makeWith(
			'createUserEmail',
			[
				'to' => $user->email
			]
		);

		$mailService->sendMail();

		return response()->json(
			[]
		);

	}

	/**
	 * Reset password
	 *
	 * @param ResetPassword $request
	 *
	 * @return JSON
	 */
	public function resetPassword(ResetPassword $request)
	{

		$userService = App::make(UserService::class);

		$resetPassword = $userService->resetPassword($request);

		if ($resetPassword instanceof PasswordReset) {

			$mailService = App::makeWith(
				'resetPasswordEmail',
				[
					'to' => $resetPassword->email,
					'resetToken' => $resetPassword->token
				]
			);

			$mailService->sendMail();

		}

		return response()->json(
			[]
		);

	}

	/**
	 * Update password
	 *
	 * @param UpdatePassword $request
	 *
	 * @return JSON
	 */
	public function updatePassword(UpdatePassword $request)
	{

		$userService = App::make(UserService::class);

		$userService->updatePassword($request);

		return response()->json(
			[]
		);

	}

	/**
	 * Log in
	 *
	 * @param LogInAccount $request
	 *
	 * @return JSON
	 */
	public function logIn(LogInAccount $request)
	{

		$authService = App::make(AuthService::class);

		$homePage = $authService->login($request);

		return response()->json(
			[
				'homePage' => $homePage
			]
		);

	}

	/**
	 * Log out
	 */
	public function logOut()
	{

		$authService = App::make(AuthService::class);

		$authService->logOut();

		return response()->json(
			[]
		);

	}

}
