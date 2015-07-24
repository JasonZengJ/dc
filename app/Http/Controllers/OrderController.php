<?php namespace diancan\Http\Controllers;

use diancan\Http\Requests;
use diancan\Http\Controllers\Controller;
use diancan\Orders;
use diancan\Carts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller {

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
	public function create(Request $request)
	{
		//

		$user		= $request->session()->get('user');
		$dishData   = json_decode($request->input('dishData'));
		$totalPrice = 0;

		foreach($dishData as $dish) {

			$totalPrice += floatval($dish->price) * $dish->amount;

		}
//		$orderData = array(
//			'dishData' => $dishData,
//			'username' => $user->user_name,
//
//
//		);

		return view('order/order_confirm',['user' => $user,'totalPrice' => $totalPrice,'dishData' => $dishData,'dishDataJson' => $request->input('dishData')]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//


		$user     = $request->session()->get('user');
		$dishData = json_decode($request->input('dishData'));

		// 保存订单
		$order = new Orders();
		$order->order_id2  = (time() << 20) + mt_rand(1, pow(2, 20)) - 1;
		$order->order_user = $user->id;
		$order->order_addtime = Date('Y-m-d H:i:s');;
		$order->order_totalprice = $request->input('totalPrice');
		$order->order_price 	= $request->input('totalPrice');
		$order->order_status    = 1;
		$order->order_text      = $request->input('position');
		$order->order_username  = $user->user_name;
		$order->order_userphone = $user->user_phone;
		$order->order_shopid    = 1;

		if ($order->save()) {

			foreach($dishData as $dish) {

				$cart = new Carts();
				$cart->cart_order  = $order->order_id2;
				$cart->cart_user   = $user->id;
				$cart->cart_food   = $dish->id;
				$cart->cart_price  = floatval($dish->price) * $dish->amount;
				$cart->cart_count  = $dish->amount;
				$cart->cart_status = 1;
				$cart->save();

			}

			return redirect('order/'.$order->id);

		} else {



		}


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
		$order = Orders::find($id);
		$user  = $request->session()->get('user');

		return view('order/order_details',['order' => $order,'user' => $user]);

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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
