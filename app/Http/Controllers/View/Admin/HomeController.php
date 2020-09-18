<?php

namespace App\Http\Controllers\View\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.welcome');
    }

    public function home()
    {
        return view('home');
    }
}
