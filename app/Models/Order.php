<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'quantity', 'total_price', 'payment_method'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
