<?php namespace laravel\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('index',['user' => $user]);
    }

}
