<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Получение всех заказов
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    // Создание нового заказа
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'nameOrder' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'korzina' => 'required|array',
            'korzina.*.pizza_id' => 'required|integer',  // Пицца должна быть в корзине
            'korzina.*.quantity' => 'required|integer|min:1',
        ]);

        // Создание нового заказа
        $order = Order::create([
            'nameOrder' => $validated['nameOrder'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'korzina' => json_encode($validated['korzina']), // Сохраняем корзину как JSON
        ]);

        return response()->json($order, 201);
    }
}
