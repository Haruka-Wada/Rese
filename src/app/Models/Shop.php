<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'genre_id', 'name', 'outline', 'image', 'owner_id'];

    protected $guarded = ['id'];

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function getSearchQuery($request, $query)
    {
        if (!empty($request->area_id)) {
            $query->where('area_id', '=', $request->area_id);
        }

        if (!empty($request->genre_id)) {
            $query->where('genre_id', '=', $request->genre_id);
        }

        if (!empty($request->keyword)) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        return $query;
    }

    //お気に入り登録しているかどうか
    public function isLikedBy($user): bool {
        $isLikedBy = Favorite::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
        return $isLikedBy;
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    //予約情報取得
    public function getReservation() {
        $reservations = Reservation::where('shop_id', '=', $this->id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return $reservations;
    }

    public function reviews() {
        return $this->belongsToMany(User::class, 'reviews');
    }

    //ショップごとの評価の平均値取得
    public function ratingAverage($shop_id) {
        $ratingAverage = Review::where('shop_id', $shop_id)
                ->selectRaw('AVG(rating) as ratingAverage')
                ->first();
        return $ratingAverage;
    }

    //口コミの数を取得
    public function reviewCount() {
        $reviewCount = Review::where('shop_id', $this->id)->count();
        if($reviewCount === 0) {
            return;
        }
        return "(".$reviewCount."件)";
    }

    //評価の順にショップを取得
    public function getShop($rating_averages) {
        $shops = [];
        foreach($rating_averages as $rating_average) {
            $shops[] = Shop::where('id', $rating_average->shop_id)->first();
        }
        return $shops;
    }

    //評価のないショップの取得
    public function getNoReviews($shops) {
        $shop_id = [];
        foreach($shops as $shop) {
            $shop_id[] = $shop->id;
        }
        $no_reviews = Shop::whereNotIn('id', $shop_id)->get();
        return $no_reviews;
    }

    //csvファイルの地域名からarea_idを取得する
    public function getAreaId($csv_data) {
        $areas = Area::all();
        foreach($areas as $area) {
            if($area->name === $csv_data) {
                $area_id = $area->id;
                return $area_id;
            }
        }
    }

    //csvファイルのジャンル名からgenre_idを取得する
    public function getGenreId($csv_data) {
        $genres = Genre::all();
        foreach ($genres as $genre) {
            if ($genre->name == $csv_data) {
                $genre_id = $genre->id;
                return $genre_id;
            }
        }
        return redirect('/owner')->with('message', 'ジャンルは、「寿司」「焼肉」「居酒屋」「イタリアン」「ラーメン」のいずれかを記入してください。');
    }
}
