<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id','user_id','rating','comment','image'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function reviewed($user_id, $shop_id) {
        $reviewed = Review::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        return $reviewed;
    }

    public static $rules = array(
        'comment' => 'required|string|max:400',
        'image' => 'file|mimes:jpeg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
    );
}
