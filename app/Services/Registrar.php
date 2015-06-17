<?php namespace laravel\Services;

use laravel\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'user_name' => 'required|max:255',
			'user_phone' => 'required|min:11|numeric|unique:qiyu_user',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'user_name' => $data['user_name'],
			'user_account' => $data['user_phone'],
			'user_phone' => $data['user_phone'],
			'password' => bcrypt($data['password']),
		]);
	}

}
