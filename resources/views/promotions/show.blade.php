@extends('layouts.app')

@section('title', 'Detail Promosi')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Gambar Promosi -->
        <div class="relative">
            <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-80 object-cover">
            <div class="absolute bottom-0 bg-black bg-opacity-50 text-white p-4 w-full">
                <h1 class="text-3xl font-bold">{{ $promotion->title }}</h1>
            </div>
        </div>

        <!-- Konten Promosi -->
        <div class="p-6">
            <p class="text-gray-700 text-lg leading-relaxed">{{ $promotion->description }}</p>

            <!-- Informasi Tambahan -->
            @if ($promotion->extra_info)
                <div class="mt-6 p-4 bg-blue-50 border-l-4 border-blue-500">
                    <h2 class="text-xl font-semibold text-blue-700">📌 Informasi Tambahan</h2>
                    <p class="text-gray-800 mt-2">{{ $promotion->extra_info }}</p>
                </div>
            @endif

            <!-- Kalimat Tambahan -->
            <div class="mt-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded-lg">
                <p class="text-yellow-800 font-semibold italic">
                    "Dapatkan promo ini sekarang sebelum kehabisan! 🎉 Penawaran terbatas hanya untuk pelanggan setia."
                </p>
            </div>

            <!-- Tombol Navigasi -->
            <div class="mt-6 flex justify-between items-center">
                <a href="{{ route('promotions.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-700 transition">
                    🔙 Kembali
                </a>

                <a href="{{ route('promotions.edit', $promotion->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition">
                    ✏️ Edit
                </a>

                <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus promosi ini?')" 
                        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                        🗑️ Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
