<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model //Название модели делать такой же как название таблицы в БД для облегчения upd:* Я ошибся, название класса нужно такое же как роуте иначе будет ошибка:)
{
    use HasFactory;
    protected $fillable = ['name', 'opisanie', 'price'];
}
