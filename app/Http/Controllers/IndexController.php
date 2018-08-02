<?php

namespace App\Http\Controllers;


class IndexController extends Controller
{

    /**
     * Login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view(
            'index.login'
        );
    }

	/**
	 * Register page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function register()
	{
		return view(
			'index.register'
		);
	}

	/**
	 * Forgot password page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function forgotPassword()
	{
		return view(
			'index.forgot-password'
		);
	}

	/**
	 * Reset password page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function resetPassword()
	{
		return view(
			'index.reset-password'
		);
	}

}
