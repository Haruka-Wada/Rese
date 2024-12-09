<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView() {
        return view('owner.login');
    }

    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('owners')->attempt($credentials)) {
            return redirect('/owner');
        };

        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/owner/login');
    }

    public function index() {
        $owner_id = Auth::guard('owners')->id();
        $shops = Shop::where('owner_id', $owner_id)->get();
        return view('owner.index', compact('shops'));
    }

    public function edit(Request $request) {
        $shop = Shop::find($request->shop_id);
        $areas = Area::all();
        $genres = Genre::all();
        return view('owner.update', compact('shop', 'areas', 'genres'));
    }

    public function update(Request $request) {
        $shop = Shop::find($request->shop_id);
        $shop->update([
            'name' => $request->name,
            'image' => $request->image,
            'area' => $request->area,
            'genre' => $request->genre,
            'outline' => $request->outline
        ]);
        return redirect('/owner');
    }

    public function create() {
        $areas = Area::all();
        $genres = Genre::all();
        return view('owner.create', compact('areas', 'genres'));
    }

    public function store(ShopRequest $request) {
        $name = $request->name;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $outline = $request->outline;
        $owner_id = $request->owner_id;

        $image = $request->file('image');
        $path = isset($image) ? $image->store('image', 'public') : '';

        $shop = Shop::create([
            'name' => $name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'outline' => $outline,
            'owner_id' => $owner_id,
            'image' => $path
        ]);

        return redirect('/owner');
    }

    public function destroy(Request $request) {
        $shop = Shop::find($request->shop_id)->delete();
        return redirect('/owner');
    }

}

