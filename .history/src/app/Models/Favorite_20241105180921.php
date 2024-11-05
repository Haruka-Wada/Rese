<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'shop_id'];
    public $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class');
    }

    public function shop() {
        return $this->belongsTo('shop::class');
        return $this->belongsTo(Genre::class);
    }
}
