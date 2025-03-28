<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'price', 'quantity'
    ];

    public function order()
{
    return $this->belongsTo(Order::class);
}
}