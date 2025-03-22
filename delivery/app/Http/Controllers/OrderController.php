<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name_order' => 'required|string',
            'phone_order' => 'required|string',
            'adress' => 'required|string',
            'cart' => 'required|array',
        ]);
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $request->cart));

        $order = Order::create([
            'name_order' => $request-> name_order,
            'phone_order' => $request->phone_order,
            'adress'=>$request->adress,
            'total_price' => $totalPrice,
            'items' => $request->cart, // Сохраняем корзину как массив
        ]);
        return response()->json(['message' => 'Заказ оформлен!', 'order_id' => $order->id]);
    }
}
