<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id','user_id','rating','comment','image'];
    protected $guarded = ['id'];

    public function shop() {
        return $this->belongsTo(Shop::class);
    }

    //口コミを以前にしているかどうか
    public function reviewed($user_id, $shop_id) {
        $reviewed = Review::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        return $reviewed;
    }

    //口コミの登録
    public function score($request, $user_id) {
        $image = $request->file('image');
        $path = isset($image) ? $image->store('review', 'public') : '';
        $full_path = asset('storage/' . $path);

        $score = Review::create([
            'shop_id' => $request->shop_id,
            'user_id' => $user_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'image' => $full_path
        ]);

        return $score;
    }

    //口コミの編集
    public function reviewUpdate($reviewed, $request) {
        $reviewUpdate = $reviewed->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        if ($request->image) {
            //ストレージに保存されている画像削除
            $old_image = basename($reviewed->image);
            Storage::disk('public')->delete('review/' . $old_image);
            //新たに保存
            $image = $image = $request->file('image');
            $path = isset($image) ? $image->store('review', 'public') : '';
            $full_path = asset('storage/' . $path);

            $reviewUpdate = $reviewed->update([
                'image' => $full_path
            ]);
        }
        return $reviewUpdate;
    }

    //評価編集時のバリデーション
    public static $rules = array(
        'comment' => 'required|string|max:400',
        'image' => 'file|mimes:jpeg,png|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000'
    );

    //評価の平均値取得
    public function getRatingAverages($query) {
        $query->select('shop_id')
            ->selectRaw('AVG(rating) as rating_average')
            ->groupBy('shop_id');
        return $query;
    }
}
