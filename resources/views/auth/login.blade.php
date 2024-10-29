<x-header-layout/>
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Kirish</h2>
    <form action="/login" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf <!-- CSRF token -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Parol</label>
            <input type="password" id="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Kirish
        </button>
    </form>
    <p class="mt-4 text-gray-600">Hisobingiz yo'qmi? <a href="/register" class="text-blue-600 hover:text-blue-700">Ro'yxatdan o'ting</a></p>
</div>
