@extends('layouts.app')

@section('content')
    <h1>Заказы</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full">
        <thead>
        <tr>
            <th>ID пользователя</th>
            <th>ID события</th>
            <th>ID билета</th>
            <th>Штрих-код</th>
            <th>Цена</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->event_id }}</td>
                <td>{{ $order->ticket_id }}</td>
                <td>{{ $order->barcode }}</td>
                <td>{{ $order->equal_price }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}">Просмотреть</a>
                    <a href="{{ route('orders.edit', $order) }}">Редактировать</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.create') }}">Новый заказ</a>
@endsection
