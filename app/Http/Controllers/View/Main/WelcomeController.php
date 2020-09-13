<?php

namespace App\Http\Controllers\View\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('main.welcome');
    }
}
