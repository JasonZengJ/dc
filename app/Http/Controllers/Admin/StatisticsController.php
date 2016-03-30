<?php namespace diancan\Http\Controllers\Admin;

use Carbon\Carbon;
use diancan\Http\Requests;
use diancan\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use diancan\Foods;
use diancan\Orders;
use diancan\Carts;
use DB;

class StatisticsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		return view('admin/statistics/statistics');
	}

	public function postDishesAmountPerMonth() {

		$foods = Foods::all(['id','food_name','food_price']);
		$monthRange = $this->monthRange(Date('Y-m-d'));
		$carts = DB::select('SELECT sum(qiyu_cart.cart_count)  as food_amount,qiyu_cart.cart_food as food_id FROM qiyu_cart where qiyu_cart.cart_addtime between ? and ?  group by qiyu_cart.cart_food',$monthRange);
		foreach($foods as &$food) {
			$food->food_amount = 0;
			foreach($carts as $cart) {
				if ($cart->food_id === $food->id) {
					$food->food_amount = $cart->food_amount * 1;
				}
			}
			$food->food_total_price = $food->food_price * $food->food_amount;
		}

		$foods = $foods->sortByDesc('food_amount')->values()->all();

		$food_names  = array_pluck($foods,'food_name');
		$food_amount = array_pluck($foods,'food_amount');

		$food_total_price = array();
		foreach($foods as $key => $food) {
			$food_total_price[$food->food_name] = $food->food_total_price;
		}

		return array('food_names' => $food_names,'food_amount' => $food_amount,'food_total_price' => $food_total_price);
	}

	public function postTotalOrderPricePerMonth() {


		$year = Input::get('year');
//		echo $year;
		$months = ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"];

		$monthDatas = array();
		for ($i = 0;$i < 12;$i++) {
			$monthRange = $this->monthRange(Carbon::now()->startOfYear()->addMonth($i));

//			$monthData = DB::select('SELECT sum(qiyu_order.order_price) as total_price FROM qiyu_order where order_addtime between ? and ? ',$monthRange);
			$monthData = Orders::whereBetween('order_addtime',$monthRange)->sum('order_price');
			array_push($monthDatas,$monthData * 1);
		}

		return array("months" => $months,"monthDatas" => $monthDatas);
	}

	public function postTotalOrderPricePerDay() {

	}

	function monthRange($date){
		$ret=array();
		$timestamp=strtotime($date);
		$mdays=date('t',$timestamp);

		array_push($ret,Date('Y-m-1 00:00:00',$timestamp));
		array_push($ret,Date('Y-m-'.$mdays.' 23:59:59',$timestamp));
		return $ret;
	}

}
