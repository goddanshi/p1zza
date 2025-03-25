<?php
namespace App\Http\Controllers;
use App\Models\Pizza;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Новый заказ', ['order' => $request->all()]);
        
        // Валидация данных
        $request->validate([
            'fullName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'comment' => 'nullable|string',
            'cart' => 'required|array',
            'cart.*.name' => 'required|string',
            'cart.*.price' => 'required|numeric',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            // Создаем заказ
            $order = Order::create([
                'full_name' => $request->fullName,
                'address' => $request->address,
                'phone' => $request->phone,
                'comment' => $request->comment,
            ]);

            // Создаем пиццы в заказе
            foreach ($request->cart as $pizza) {
                $order->pizzas()->create([  // Предполагается, что у вас есть связь pizzas() в модели Order
                    'name' => $pizza['name'],
                    'price' => $pizza['price'],
                    'quantity' => $pizza['quantity'],
                ]);
            }

            return response()->json(['message' => 'Заказ успешно создан!'], 201);
        } catch (\Exception $e) {
            // Логируем ошибку
            Log::error('Ошибка при создании заказа: ' . $e->getMessage());
            return response()->json(['error' => 'Произошла ошибка на сервере'], 500);
        }
    }

    public function index()
{
    // Загружаем все заказы с их связанными пиццами
    $orders = Order::with('pizzas')->get();  // Используем метод with для жадной загрузки

    return response()->json($orders);
}
}