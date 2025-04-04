@extends('layouts.app')

@section('title', 'Daftar Promosi')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-8 text-center">📢 Daftar Promosi</h1>

        @if ($promotions->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($promotions as $promo)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition duration-300">
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->title }}" class="w-full h-56 object-cover">

                        <div class="p-6">
                            <h2 class="text-2xl font-semibold text-gray-800">{{ $promo->title }}</h2>
                            <p class="text-gray-600 mt-3">{{ Str::limit($promo->description, 100) }}</p>

                            <div class="mt-5 flex justify-between items-center">
                                <a href="{{ route('promotions.show', $promo->id) }}" 
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                                    🔍 Lihat Detail
                                </a>

                                <a href="{{ route('promotions.edit', $promo->id) }}" 
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-600 transition">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('promotions.destroy', $promo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus promosi ini?')" 
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center text-lg">🚫 Belum ada promosi.</p>
        @endif
    </div>
@endsection
