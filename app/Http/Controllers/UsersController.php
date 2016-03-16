<?php namespace diancan\Http\Controllers;

use diancan\Http\Requests;
use diancan\Http\Controllers\Controller;

use diancan\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id,Request $request)
	{
		//

//		echo json_encode($request->getSession()->get('user'));

		return response()->json($request->getSession()->get('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,Request $request)
	{
		//
		return view('user.edit',['user' => $request->getSession()->get('user'),'headerTitle' => '个人资料修改']);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		//

		$user = $request->getSession()->get('user');

		$user->user_name = Input::get('userName');

		if ($user->save()) {

			return redirect('/');

		} else {

		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
