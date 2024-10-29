@extends('layouts.app')

@section('content')
    <h1>Buyurtmalar</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Event ID</th>
            <th>Ticket ID</th>
            <th>Barcode</th>
            <th>Equal Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        @dd($orders)
            <tr>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->event_id }}</td>
                <td>{{ $order->ticket_id }}</td>
                <td>{{ $order->barcode }}</td>
                <td>{{ $order->equal_price }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}">Ko'rish</a>
                    <a href="{{ route('orders.edit', $order) }}">Tahrirlash</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">O'chirish</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.create') }}">Yangi Buyurtma</a>
@endsection

