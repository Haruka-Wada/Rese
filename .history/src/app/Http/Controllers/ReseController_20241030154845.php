<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;

class ReseController extends Controller
{
    function index() {
        $shops = Shop::all();
        $areas = Area::all();
        return view('shop_all', compact('shops', 'areas'));
    }

    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }
}
