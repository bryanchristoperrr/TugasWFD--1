<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Promo Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-2xl font-bold hover:text-gray-200 transition">🔥 PromoSite</a>
            <div>
                <a href="{{ route('promotions.index') }}" class="text-white mx-3 hover:underline">Home</a>
                <a href="{{ route('promotions.create') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg shadow-md hover:bg-gray-300 transition">
                    ➕ Tambah Promo
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-blue-500 text-white text-center py-16">
        <h1 class="text-4xl font-bold mb-2">Temukan Promo Terbaik di Sini!</h1>
        <p class="text-lg">Dapatkan berbagai penawaran menarik hanya untuk Anda.</p>
        <a href="{{ route('promotions.index') }}" class="mt-4 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
            Lihat Promo
        </a>
    </header>

    <!-- Konten Utama -->
    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-6 mt-10">
        <p>&copy; 2025 PromoSite. All rights reserved.</p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="#" class="hover:text-blue-400 transition"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="hover:text-red-400 transition"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </footer>

</body>
</html>
