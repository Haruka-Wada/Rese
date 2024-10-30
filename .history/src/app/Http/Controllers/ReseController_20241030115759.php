<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AppM

class ReseController extends Controller
{
    function index() {
        $shops = Shop::all();
        return view('shop_all');
    }
    
    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }
}
