<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Models\Order;
use App\Models\OrderItem;
class PizzaController extends Controller
{
    public function index()
    {
        return response()->json(Pizza::all());
    }

    public function storeOrder(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'address' => 'required|string|min:7',
            'phone' => 'required|string|min:10|max:15',
            'comment' => 'nullable|string|max:500',
            'cart' => 'required|array|min:1',
            'cart.*.name' => 'required|string',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        // Создание нового заказа
        $order = Order::create([
            'full_name' => $request->fullName,
            'address' => $request->address,
            'phone' => $request->phone,
            'comment' => $request->comment,
            'cart' =>$request->fullName,
        ]);

        // Сохранение позиций заказа
        foreach ($request->cart as $pizza) {
            $order->pizzas()->create([
                'name' => $pizza['name'],
                'price' => $pizza['price'],
                'quantity' => $pizza['quantity'],
            ]);
        }

        // Ответ с подтверждением
        return response()->json(['message' => 'Заказ успешно оформлен', 'order' => $order], 201);
    }
}