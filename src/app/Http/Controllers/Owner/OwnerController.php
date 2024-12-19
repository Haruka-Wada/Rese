<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function index()
    {
        $owner_id = Auth::guard('owners')->id();
        $shops = Shop::where('owner_id', $owner_id)->get();
        return view('owner.index', compact('shops'));
    }

    public function edit(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        $areas = Area::all();
        $genres = Genre::all();
        return view('owner.update', compact('shop', 'areas', 'genres'));
    }

    public function update(ShopRequest $request)
    {
        $shop = Shop::find($request->shop_id);
        $image = $request->file('image');
        $path = $shop->image;
        if(isset($image)) {
            Storage::disk('public')->delete($path);
            $path = $image->store('image', 'public');
        }
        $full_path = asset('storage/' .$path);

        $shop->update([
            'name' => $request->name,
            'image' => $full_path,
            'area' => $request->area,
            'genre' => $request->genre,
            'outline' => $request->outline
        ]);
        return redirect('/owner');
    }

    public function create()
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view('owner.create', compact('areas', 'genres'));
    }

    public function store(ShopRequest $request)
    {
        $name = $request->name;
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $outline = $request->outline;
        $owner_id = $request->owner_id;

        $image = $request->file('image');
        $path = isset($image) ? $image->store('image', 'public') : '';
        $full_path = asset('storage/' . $path);

        $shop = Shop::create([
            'name' => $name,
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'outline' => $outline,
            'owner_id' => $owner_id,
            'image' => $full_path
        ]);

        return redirect('/owner');
    }

    public function destroy(Request $request)
    {
        $shop = Shop::find($request->shop_id)->delete();
        return redirect('/owner');
    }

}
