<?php

namespace App\Http\Controllers\Shopadmin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/shopadmin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('shopadmin.auth:shopadmin');
    }

    /**
     * Show the Shopadmin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('shopadmin.home');
    }

}