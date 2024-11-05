<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ReseController extends Controller
{
    function index() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('shop_all', compact('areas', 'genres', 'shops'));
    }

    function thanks() {
        return view('auth.thanks');
    }

    function done() {
        return view('done');
    }

    function detail(Request $request) {
        $shop
    }
}
