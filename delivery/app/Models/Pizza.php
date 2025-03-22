<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pizzas extends Model //Название модели делать такой же как название таблицы в БД для облегчения
{
    use HasFactory;
    protected $fillable = ['name', 'opisanie', 'price'];
}
