<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use resources\views\promotions;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
    return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotions.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'extra_info' => 'required|string'
    ]);

    // Upload gambar
    $imagePath = $request->file('image')->store('promotions', 'public');
    $path = $request->file('image')->store('promotions', 'public');


    // Simpan ke database
    Promotion::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
        'extra_info' => $request->extra_info,
    ]);

    // Redirect kembali ke halaman utama dengan pesan sukses
    return redirect()->route('promotions.index')->with('success', 'Promosi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            abort(404); // Jika promosi tidak ditemukan, tampilkan error 404
        }
    
        return view('promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            abort(404); // Jika promosi tidak ditemukan, tampilkan error 404
        }
    
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::find($id);
    
        if (!$promotion) {
            return redirect()->route('promotions.index')->with('error', 'Promosi tidak ditemukan.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $promotion->title = $request->title;
        $promotion->description = $request->description;
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('promotions', 'public');
            $promotion->image = $path;
        }
    
        $promotion->save();
    
        return redirect()->route('promotions.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    $promotion = Promotion::find($id);

    if (!$promotion) {
        return redirect()->route('promotions.index')->with('error', 'Promosi tidak ditemukan.');
    }

    $promotion->delete();

    return redirect()->route('promotions.index')->with('success', 'Promosi berhasil dihapus.');
}
    }

