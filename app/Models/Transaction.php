<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'total_price', 'rented_at', 'returned_at'];

    // Cast the rented_at and returned_at fields as Carbon instances
    protected $dates = ['rented_at', 'returned_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Product::class, 'book_id');
    }
}
