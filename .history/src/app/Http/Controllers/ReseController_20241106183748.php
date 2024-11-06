<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

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

    public function reservation(Request $request) {
        $user_id = Auth::id();
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;

        $reservation = Reservation::create([
            'user_ic'
        ])
    }

    public function favorite(Request $request) {
        $user_id = Auth::id();
        $shop_id = $request->shop_id;
        $already_liked = Favorite::where('user_id', $user_id)->where('shop_id', $shop_id)->first();

        if(!$already_liked) {
            $favorite = Favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id
            ]);
        }else {
            Favorite::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();
        }

        return back();
    }

    public function myPage() {
        $user_id = Auth::id();
        $favorites = Favorite::with('shop')->where('user_id', $user_id)->get();
        return view('my_page', compact('favorites'));
    }
}
