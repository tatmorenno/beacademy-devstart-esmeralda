<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::query();


        // find users with searched email
        $orders = $orders->when($request->search, function ($query, $search) {
            return $query->whereHas('user', function ($query) use ($search) {
                $query->where('email', 'like', "%{$search}%");
            });
        });

        $orders = $orders->paginate(5);

        foreach ($orders as $order) {
            Order::setOrderInfo($order);
        }

        if ($request->search) {
            $orders->appends('search', $request->search);
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        Order::setOrderInfo($order);

        $order->uniqueProducts = Order::getUniqueProducts($order);

        return view('admin.orders.show', compact('order'));
    }
}
