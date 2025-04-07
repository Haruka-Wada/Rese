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

    public function review() {
        return $this->hasMany(Review::class);
    }

    public function sort($request, $query) {
        if($request->sort == "random") {
            $query->inRandomOrder();
            return $query;
        }elseif($request->sort == "desc") {
            $ratingAverage = Review::select('shop_id')
                            ->selectRaw('AVG(rating) as ratingAverage')
                            ->groupBy('shop_id')
                            ->get()
                            ->sortBy('ratingAverage');
            dd($ratingAverage);
        }
    }

    public function isLikedBy($user): bool {
        return favorite::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function getReservation() {
        $reservations = Reservation::where('shop_id', '=', $this->id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return $reservations;
    }

    public function reviews() {
        return $this->belongsToMany(User::class, 'reviews');
    }

    public function ratingAverage($shop_id) {
        $ratingAverage = Review::where('shop_id', $shop_id)
                ->selectRaw('AVG(rating) as ratingAverage')
                ->first();
        return $ratingAverage;
    }

    public function reviewCount() {
        $reviewCount = Review::where('shop_id', $this->id)->count();
        if($reviewCount === 0) {
            return;
        }
        return "(".$reviewCount."件)";
    }

    public function getShop($rating_averages) {
        $shops = [];
        foreach($rating_averages as $rating_average) {
            $shops[] = Shop::where('id', $rating_average->shop_id)->first();
        }
        return $shops;
    }

    public function getNoReviews($shops) {
        $shop_id = [];
        foreach($shops as $shop) {
            $shop_id[] = $shop->id;
        }
        $no_reviews = Shop::whereNotIn('id', $shop_id)->get();
        return $no_reviews;
    }
}
