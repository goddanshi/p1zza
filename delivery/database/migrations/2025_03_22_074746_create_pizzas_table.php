<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id(); //Первичный ключ с автоиннкрементом
            $table->string('name'); //Имя позиции
            $table->text('opisanie'); //Описание позиции
            $table->decimal('price', 8,2); //Цена максимум 8 знаков, 2 знака после запятой
            $table->integer('quantity')->unsigned(); //Количество не может быть отрицательным применяется ->(unsigned)**
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
