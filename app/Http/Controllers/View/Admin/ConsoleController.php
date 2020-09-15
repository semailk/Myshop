<?php

namespace App\Http\Controllers\View\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function index() {
        return view('admin.console');
    }
}
