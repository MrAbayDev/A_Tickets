<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $orders = Order::with(['user', 'event', 'ticket'])->get();
        return view('orders.index', compact('orders'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::all();
        $events = Event::all();
        $tickets = Ticket::all();
        return view('orders.create', compact('users', 'events', 'tickets'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'barcode' => 'required|string|unique:orders,barcode',
            'equal_price' => 'required|numeric',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = User::all();
        $events = Event::all();
        $tickets = Ticket::all();
        return view('orders.edit', compact('order', 'users', 'events', 'tickets'));
    }

    public function update(Request $request, Order $order): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'ticket_id' => 'required|exists:tickets,id',
            'barcode' => 'required|string|unique:orders,barcode,' . $order->id,
            'equal_price' => 'required|numeric',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order): \Illuminate\Http\RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}