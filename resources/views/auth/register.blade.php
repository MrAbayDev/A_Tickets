<x-header-layout/>
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Ro'yxatdan o'tish</h2>
        <form action="/register" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Ism</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Parol</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Parolni tasdiqlash</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Ro'yxatdan o'tish
            </button>
        </form>
        <p class="mt-4 text-gray-600">Allaqachon hisobingiz bormi? <a href="/login" class="text-blue-600 hover:text-blue-700">Kirish</a></p>
    </div>
