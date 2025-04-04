<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-blue-700 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('promotions.index') }}" class="text-white text-2xl font-bold">🔥 PromoSite</a>
            <a href="{{ route('promotions.create') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition duration-300">
                ➕ Tambah Promosi
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 text-center py-4">
        <p>&copy; 2025 PromoSite - Semua Hak Dilindungi</p>
    </footer>

</body>
</html>
