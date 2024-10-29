<?php

namespace App\Http\Controllers;

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
        return view('tickets.order-create', compact('users', 'events', 'tickets'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'adult_tickets' => 'required|integer|min:0',
            'child_tickets' => 'required|integer|min:0',
        ]);

        $barcode = uniqid();
        $orderData = [
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'adult_tickets' => $request->adult_tickets,
            'child_tickets' => $request->child_tickets,
            'barcode' => $barcode,
            'equal_price' => $request->equal_price,
        ];

        $order = Order::create($orderData);

        $response = $this->bookOrder($order);

        if ($response['message'] === 'order successfully booked') {
            $this->approveOrder($barcode);
            return redirect()->route('home')->with('success', 'order successfully booked, Barcode: ' . $barcode);
        } else {
            return redirect()->route('order.buy')->with('error', $response['barcode already exists']);
        }
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

    private function bookOrder(Order $order) {
        $response = $this->sendRequest('https://api.site.com/book', [
            'event_id' => $order->event_id,
            'event_date' => now(),
            'ticket_adult_price' => $order->equal_price, // Narx
            'ticket_adult_quantity' => 1, // Narsani soni
            'ticket_kid_price' => 0, // Bolalar chiptasi narxi
            'ticket_kid_quantity' => 0, // Bolalar chiptasi soni
            'barcode' => $order->barcode,
        ]);

        return $response;
    }

    private function approveOrder($barcode) {
        $response = $this->sendRequest('https://api.site.com/approve', [
            'barcode' => $barcode,
        ]);

        if (isset($response['message']) && $response['message'] === 'order successfully aproved') {
            return true;
        } else {
            // Xatolikni qayta ishlash
            // Masalan, logga yozish yoki foydalanuvchiga bildirish
            return false;
        }
    }

    private function sendRequest($url, $data) {
        // API ga so‘rov yuborish logikasi
        // Mening misol sifatida natijani tasodifiy qaytaramiz
        $responses = [
            ['message' => 'order successfully booked'],
            ['error' => 'barcode already exists'],
        ];
        return $responses[array_rand($responses)];
    }
}
