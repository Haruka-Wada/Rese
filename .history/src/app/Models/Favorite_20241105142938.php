<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'shop_id'];
    public $guarded = 

    public function user() {
        return $this->belongsTo('shop::class');
    }
}
