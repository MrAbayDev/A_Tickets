<x-header-layout/>
<main class="container mx-auto px-6 py-12">
    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Mening biletlarim</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tickets as $ticket)
                <!-- Ticket Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="mb-4">
                        <img src="/api/placeholder/400/200" alt="Ticket Event" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">{{ $ticket->name }}</h3>
                        <p class="text-gray-600 mb-2">{{ $ticket->date }} • {{ $ticket->time }}</p>
                        <p class="text-gray-600 mb-4">{{ $ticket->location }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-bold">Сумма: {{ $ticket->price }} сум</span>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Ko‘rish
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
<x-footer-layout/>
