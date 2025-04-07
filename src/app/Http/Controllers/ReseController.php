<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Storage;


class ReseController extends Controller
{
    public function index() {
        $shops = Shop::inRandomOrder()->get();
        $areas = Area::all();
        $genres = Genre::all();
        session()->flash('message', null);
        return view('shop_all', compact('areas', 'genres', 'shops'));
    }

    public function search(Request $request) {
        $query = Shop::query();
        $query = Shop::getSearchQuery($request, $query);
        $shops = $query->get();
        return response()->json(['shops'=>$shops]);
    }

    public function thanks() {
        return view('auth.thanks');
    }

    public function detail(Request $request) {
        $shop = Shop::find($request->shop_id);
        $afterReservation = Reservation::afterReservation(Auth::id(), $request->shop_id);
        $reviewed = Review::reviewed(Auth::id(), $request->shop_id);
        $reviews = Review::where('shop_id', $request->shop_id)->get();
        return view('shop_detail', compact('shop', 'afterReservation', 'reviewed', 'reviews'));
    }

    public function myPage() {
        $user_id = Auth::id();
        $reservations = Reservation::with('shop')->where('user_id', $user_id)->get();
        $favorites = Favorite::with('shop')->where('user_id', $user_id)->get();
        return view('my_page', compact('reservations', 'favorites'));
    }

    //予約機能
    public function reservation(ReservationRequest $request) {
        $user_id = Auth::id();
        $shop_id = $request->shop_id;
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;

        $reservation = Reservation::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'date' => $date,
            'time' => $time,
            'number' => $number
        ]);

        return view('done');
    }

    public function reservationDelete(Request $request) {
        Reservation::find($request->reservation)->delete();
        return redirect('/mypage');
    }

    public function reservationEdit(Request $request) {
        $reservation = Reservation::find($request->reservation);
        return view('edit', compact('reservation'));
    }

    public function reservationUpdate(ReservationRequest $request) {
        $reservation = Reservation::find($request->id);
        $reservation->update([
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number
        ]);
        return redirect('/mypage');
    }

    //お気に入り機能
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

    //レビュー機能
    public function review(Request $request) {
        $shop = Shop::find($request->shop_id);
        $reviewed = Review::reviewed(Auth::id(),  $request->shop_id);
        return view('review', compact('shop', 'reviewed'));
    }

    public function score(ReviewRequest $request) {
        $image = $request->file('image');
        $path = isset($image) ? $image->store('review', 'public') : '';
        $full_path = asset('storage/' . $path);

        Review::create([
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'image' => $full_path
        ]);

        return redirect(route('rese.detail',[
            'shop_id' => $request->shop_id
        ]));
    }

    public function reviewEdit(Request $request) {
        $shop = Shop::find($request->shop_id);
        $reviewed = Review::reviewed(Auth::id(), $request->shop_id);
        return view('review_edit', compact('shop', 'reviewed'));
    }

    public function reviewUpdate(Request $request) {
        $this->validate($request, Review::$rules);
        $reviewed = Review::reviewed(Auth::id(), $request->shop_id);
        $reviewed->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        if($request->image) {
            //ストレージに保存されている画像削除
            $old_image = basename($reviewed->image);
            Storage::disk('public')->delete('review/' . $old_image);
            //新たに保存
            $image = $image = $request->file('image');
            $path = isset($image) ? $image->store('review', 'public') : '';
            $full_path = asset('storage/' . $path);

            $reviewed->update([
                'image' => $full_path
            ]);
        }

        return redirect(route('rese.detail', [
            'shop_id' => $request->shop_id
        ]));
    }

    public function reviewDelete(Request $request) {
        $reviewed = Review::reviewed($request->user_id, $request->shop_id);
        $reviewed_image = basename($reviewed->image);
        Storage::disk('public')->delete('review/' . $reviewed_image);
        $reviewed->delete();
        return back()->with('message', '口コミを削除しました');
    }

    //ソート機能
    public function sort(Request $request) {
        if ($request->sort == "random") {
            $shops = Shop::inRandomOrder()->get();
            $no_reviews = [];
            $sort = "ランダム";
        } else {
            if($request->sort == "desc") {
                $query = Review::query();
                $query = Review::getRatingAverages($query);
                $rating_averages = $query->get()
                                ->sortByDesc('rating_average');
                $sort = "評価の高い順";
            }elseif($request->sort == "asc") {
                $query = Review::query();
                $query = Review::getRatingAverages($query);
                $rating_averages = $query->get()
                    ->sortBy('rating_average');
                $sort = "評価の低い順";
            }
            $shops = Shop::getShop($rating_averages);
            $no_reviews = Shop::getNoReviews($shops);
        }
        $areas = Area::all();
        $genres = Genre::all();
        $text = "検索情報： " . $sort;
        session()->flash('message', $text);
        return view('shop_all', compact('shops', 'no_reviews', 'areas', 'genres',));
    }
}
