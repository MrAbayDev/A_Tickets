<x-header-layout/>
<main class="container mx-auto px-6 py-12">
    <section>
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Концерты</h2>
            <a href="/tickets" class="text-blue-600 hover:text-blue-700">Показать все</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div>
                        <h3 class="text-xl font-bold mb-2">{{ $event->name }}</h3>
                        <p class="text-gray-600 mb-2">{{$event->description}}</p>
                        <p class="text-gray-600 mb-4">{{$event->schedule}}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-bold">от {{ $event->ticket->ticketType->child_price }} сум</span>
                            @if(auth()->check()) <!-- Foydalanuvchi tizimda kirganligini tekshirish -->
                            <a href="/order/buy" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Купить
                            </a>
                            @else
                                <a href="/login" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Kirish / Ro'yxatdan o'tish
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
<x-footer-layout/>
</body>
</html>
