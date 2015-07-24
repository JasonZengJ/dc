<?php namespace diancan\Http\Controllers\Admin;

use diancan\FoodsType;
use diancan\Http\Requests;
use diancan\Http\Controllers\Controller;

use Illuminate\Http\Request;
use diancan\Foods;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class DishesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return view('admin/dishes/dishes',["dishes" => Foods::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$foodsTypes = FoodsType::all(['id','foodtype_name']);
		return view('admin/dishes/dishes_add',['dishTypes' => $foodsTypes]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$food = new Foods();
		$food->food_name  	 = Input::get('dish_name');
		$food->food_price 	 = Input::get('dish_price');
		$food->food_types_id = Input::get('dish_cate');

		if($food->save()) {

			return redirect('admin/dishes');

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
		return view('admin/dishes/dishes_details');
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
		$foods = Foods::find($id);
		$foodsTypes = FoodsType::all(['id','foodtype_name']);
		return view('admin/dishes/dishes_edit',['dish' => $foods,'dishTypes' => $foodsTypes]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$foods = Foods::find($id);
		$foods->food_name  	  = Input::get('dish_name');
		$foods->food_price    = Input::get('dish_price');
		$foods->food_types_id = Input::get('dish_cate');

		if ($foods->save()) {
			return redirect('/admin/dishes');
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
		$food = Foods::find($id);
		if($food->delete()) {
			return json_encode(array(
				'code' => 0,
				'msg'  => '删除成功 '
			));
		} else {
			return json_encode(array(
				'code' => 1,
				'msg'  => '删除失败 '
			));
		}

	}

}
