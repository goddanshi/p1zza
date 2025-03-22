<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameOrder', 'phone', 'address', 'korzina'
    ];

    protected $casts = [
        'korzina' => 'array', // Преобразуем поле korzina в массив
    ];
}
