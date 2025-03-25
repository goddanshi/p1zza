<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Order extends Model
{
    protected $fillable = [
        'full_name', 'address', 'phone', 'comment'
    ];

    public function pizzas()
{
    return $this->hasMany(Pizza::class);
}
}