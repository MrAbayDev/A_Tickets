<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use http\Client\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = Order::with(['user', 'event', 'ticket'])->get();
        return response()->json($orders);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'barcode' => 'required|string',
            'equal_price' => 'required|numeric',
        ]);

        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order): JsonResponse
    {
        return response()->json($order->load(['user', 'event', 'ticket']));
    }

    public function update(Request $request, Order $order): JsonResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'barcode' => 'required|string',
            'equal_price' => 'required|numeric',
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy(Order $order):JsonResponse
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
