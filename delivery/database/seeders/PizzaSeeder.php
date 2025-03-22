<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    public function run(){
        Pizza::create([
            'name' => 'Ветчина и курица',
            'opisanie' => 'Тесто для пиццы, соус сливочный, сыр моцарелла, куринное филе, ветчина, помидоры.',
            'price' => 660,
            'quantity' => 0, 
            // 'image' => 'images/pizza_margherita.jpg',
        ]);

        Pizza::create([
            'name' => 'Пепперони',
            'opisanie' => 'Тесто для пиццы, соус фирменный, сыр моцарелла, салями оригинальная.',
            'price' => 600,
            'quantity' => 0, 
            // 'image' => 'images/pizza_margherita.jpg',
        ]);

        Pizza::create([
            'name' => 'Маргарита',
            'opisanie' => 'Тесто для пиццы, соус фирменный, сыр моцарелла, помидоры.',
            'price' => 660,
            'quantity' => 0, 
            // 'image' => 'images/pizza_margherita.jpg',
        ]);
    }
}
