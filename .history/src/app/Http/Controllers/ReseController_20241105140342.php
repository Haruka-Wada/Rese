<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

use function PHPUnit\Framework\returnCallback;

class ReseController extends Controller
{
    public function index() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('shop_all', compact('areas', 'genres', 'shops'));
    }

    public function thanks() {
        return view('auth.thanks');
    }

    public function done() {
        return view('done');
    }

    public function detail(Request $request) {
        $shop = Shop::find($request->shop_id);
        return view('shop_detail', compact('shop'));
    }

    public function favorite(Request $request) {
        $user_id = Auth::id()
    }
}
