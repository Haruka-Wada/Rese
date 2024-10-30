<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReseController extends Controller
{
    function index() {
        $shops = Shop::
        return view('shop_all');
    }
    
    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }
}
