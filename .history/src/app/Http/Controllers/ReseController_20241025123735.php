<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReseController extends Controller
{
    function index() {
        return view('shop_all');
    }

    function done() {
        return view('done');
    }
}
