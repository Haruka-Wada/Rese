<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['reservation_id','rating','comment'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Reservation::class);
    }
}