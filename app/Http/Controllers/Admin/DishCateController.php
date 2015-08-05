<?php namespace diancan\Http\Controllers\Admin;

use diancan\Http\Requests;
use diancan\Http\Controllers\Controller;
use diancan\FoodsType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DishCateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view('admin/dish_cates/dish_cates',['dishCates' => FoodsType::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin/dish_cates/dish_cates_add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		$this->validate($request,[
			'cateName' => 'required'
		]);

		$dishCates = new FoodsType();
		$dishCates->foodtype_name = Input::get('cateName');

		if ($dishCates->save()) {

			return redirect('admin/dishCates');

		} else {

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$dishCate = FoodsType::find($id);
		return view('admin/dish_cates/dish_cates_edit',['dishCate' => $dishCate]);
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
		$this->validate($request,[
			'cateName' => 'required'
		]);
		$dishCate = FoodsType::find($id);
		$dishCate->foodtype_name = Input::get('cateName');

		if ($dishCate->save()) {
			return redirect('admin/dishCates');
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
