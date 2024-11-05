<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'genre_id', 'name', 'outline', 'image'];

    protected $guarded = ['id'];

    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function isLikedBy($user): bool {
        return favorite::where('user_id', $user->id)
    }
}
