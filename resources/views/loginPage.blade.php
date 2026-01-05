@include('header')
<div class="min-h-screen flex items-center justify-center px-4">
    <!-- Card Login -->
    <div class="max-w-md w-full bg-gray-800 rounded-2xl shadow-2xl p-8">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mt-4 text-yellow-400">Login Semar Rent Car</h1>
            <p class="text-white/70 mt-2 text-sm">Masukkan email dan password Anda untuk masuk</p>
        </div>

        <!-- Form -->
        <form action="{{ route('loginSystem') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-semibold text-yellow-400">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" 
                    class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white">
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-semibold text-yellow-400">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" 
                    class="w-full px-4 py-2 rounded-xl bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 text-white">
            </div>

            <button type="submit" 
                class="w-full py-2 rounded-full bg-yellow-400 text-black font-semibold hover:bg-yellow-500 transition duration-300">
                Masuk
            </button>
        </form>
    </div>
</div>
