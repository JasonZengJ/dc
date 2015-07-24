<?php namespace diancan\Http\Controllers;

use Illuminate\Http\Request;
use diancan\FoodsType;

class IndexController extends Controller {


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

}
