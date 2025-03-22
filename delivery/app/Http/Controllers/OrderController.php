<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Получение всех заказов
    public function index()
    {
        $orders = Order::all();
    
        return response()->json($orders->map(function ($order) {
            $orderData = $order->toArray();
            $korzina = json_decode($order->korzina, true); //Декодинг в ассоциативный массив
    
            if (!is_array($korzina)) {
                $korzina = []; //Создаю пустой массив если данные невалидны
            }
    
            $orderData['korzina'] = array_map(function ($item) {
                $pizza = Pizza::find($item['pizza_id']);
                return [
                    'id' => $item['pizza_id'],
                    'Name' => $pizza ? $pizza->name : 'Неизвестная пицца',
                    'composition' => $pizza ? $pizza->opisanie : 'Описание отсутствует',
                    'quantity' => $item['quantity'],
                    'Price' => $pizza ? $pizza->price : 0,
                    'Total price' => $pizza ? $pizza->price * $item['quantity'] : 0
                ];
            }, $korzina);
            $orderData['Total price:'] = array_sum(array_column($orderData['korzina'], 'Total price'));
            return $orderData;
        }));
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
        $order = Order::create([
            'nameOrder' => $validated['nameOrder'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'korzina' => json_encode($validated['korzina']), // Сохраняем корзину как JSON
        ]);

        return response()->json($order, 201);
    }
}
