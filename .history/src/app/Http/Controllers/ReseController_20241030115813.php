<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ReseController extends Controller
{
    function index() {
        $shops = Shop::all();
        return view('shop_all', compact(''));
    }
    
    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }
}
