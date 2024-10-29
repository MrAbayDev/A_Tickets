<x-header-layout/>
<main class="container mx-auto px-6 py-12">
    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Chipta sotib olish</h2>
        <form action="{{ route('orders.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Ismingiz</label>
                <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ismingizni kiriting">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email manzilingizni kiriting">
            </div>
            <div class="mb-4">
                <label for="adult-tickets" class="block text-gray-700 font-bold mb-2">Kattalar bileti soni</label>
                <input type="number" id="adult-tickets" name="adult_tickets" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Sonini kiriting">
            </div>
            <div class="mb-4">
                <label for="child-tickets" class="block text-gray-700 font-bold mb-2">Kichkinalar bileti soni</label>
                <input type="number" id="child-tickets" name="child_tickets" min="0" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Sonini kiriting">
            </div>
            <div class="mb-4">
                <label for="payment" class="block text-gray-700 font-bold mb-2">To‘lov usuli</label>
                <select id="payment" name="payment" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Tanlang</option>
                    <option value="card">Bank karta</option>
                    <option value="cash">Naqd pul</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Sotib olish
                </button>
            </div>
        </form>
    </section>
</main>
<x-footer-layout/>
