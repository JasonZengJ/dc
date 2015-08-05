<?php namespace diancan\Http\Controllers;

use Illuminate\Http\Request;
use diancan\FoodsType;
use Illuminate\Support\Facades\Input;
use diancan\Orders;
use League\Flysystem\Exception;

class PrintController extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user=$request->session()->get('user');

        $foods_types = FoodsType::all();

//        foreach($foods_types as $foodtype) {
//            $foods = $foodtype->foods()->get();
//            dump($foods);
//        }

//        $foods_data = array();

//        dump($foods_types);


        return view('index',['user' => $user,'foods_data' => $foods_types]);
    }

    public function getOrderInfo(Request $request) {


        if (!Input::get('id')) {
            $orderId = '31';
        } else {
            $orderId = Input::get('id');
        }
        $order = Orders::find($orderId);

        $foods = array();
        foreach($order->carts as $cart) {

            $food = array(
                'food_name' => $cart->food->food_name,
                'foods_price' => $cart->food->food_price,
                'cart_count'  => $cart->cart_count,
                'cart_price'  => $cart->cart_price
            );

            array_push($foods,$food);

        }

        return view('print',['order' => $order,'foods' => json_encode($foods)]);

    }

    public function postPrintedOrder() {

        $orderId = Input::get('id');
        $order = Orders::find($orderId);
        $order->order_status = 1;
        if ($order->save()) {

        } else {
            throw new Exception();
        }

    }

    public function postCheckOrder() {

        $order = Orders::where('order_status','0')->first();

        $result = array(
            'done' => false,
            'data'  => null
        );
        if ($order) {
            $result['done'] = true;
            $result['data'] = array('orderId' => $order->id);
        }

        return json_encode($result);

    }

}
