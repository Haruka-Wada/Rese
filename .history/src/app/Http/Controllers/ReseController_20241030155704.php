<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use A

class ReseController extends Controller
{
    function index() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('shop_all', compact('areas', 'genre', 'shop'));
    }

    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }
}
