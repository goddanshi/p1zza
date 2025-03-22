<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); //Автоинкремент
            $table->string('name_order'); //Имя заказчика
            $table->string('phone_order'); //Номер заказчика
            $table->text('adress'); //Адрес заказчика
            $table->text('comment'); //Комментарий к заказу
            $table->decimal('total_price', 8, 2); //Конечная цена заказа
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
