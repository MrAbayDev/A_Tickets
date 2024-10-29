<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        'equal_price' => 'required|numeric',
    ]);

    DB::transaction(function () use ($request) {

        $barcode = Str::random(10);

        if (Order::where('barcode', $barcode)->exists()) {
            return response()->json(['error' => 'barcode already exists'], 400);
        }

        Order::create([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
            'ticket_id' => $request->ticket_id,
            'barcode' => $barcode,
            'equal_price' => $request->equal_price,
        ]);
    });

    return response()->json(['message' => 'order successfully booked'], 201);
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
