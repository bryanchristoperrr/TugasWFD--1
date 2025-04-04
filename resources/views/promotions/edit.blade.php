@extends('layouts.app')

@section('title', 'Edit Promosi')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">✏️ Edit Promosi</h1>

        <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Judul -->
            <div>
                <label class="block text-gray-700 font-semibold">Judul:</label>
                <input type="text" name="title" value="{{ $promotion->title }}" required class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan judul promosi">
            </div>

            <!-- Input Deskripsi -->
            <div>
                <label class="block text-gray-700 font-semibold">Deskripsi:</label>
                <textarea name="description" required class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4">{{ $promotion->description }}</textarea>
            </div>

            <!-- Input Gambar -->
            <div>
                <label class="block text-gray-700 font-semibold">Gambar Saat Ini:</label>
                <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover rounded-lg shadow-md">

                <label class="block text-gray-700 font-semibold mt-4">Ganti Gambar:</label>
                <input type="file" name="image" class="w-full border p-3 rounded-lg bg-gray-50 cursor-pointer">
            </div>

            <!-- Input Detail Produk -->
            <div>
                <label class="block text-gray-700 font-semibold">Detail Produk:</label>
                <textarea name="extra_info" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Tambahkan detail tambahan produk">{{ $promotion->extra_info }}</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-green-700 transition">
                    ✅ Simpan Perubahan
                </button>
                <a href="{{ route('promotions.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-gray-700 transition">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
@endsection
