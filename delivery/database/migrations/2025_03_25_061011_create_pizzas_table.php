<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Название пиццы
            $table->decimal('price', 8, 2);  // Цена пиццы
            $table->integer('quantity');  // Количество пицц в заказе
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');  // Внешний ключ для связи с заказом
            $table->timestamps();  // Created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
