<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Menampilkan semua obat
    public function index()
    {
        $obats = Obat::all();
        
        return view('obats.index', compact('obats'));
    }

    // Menampilkan form untuk membuat obat baru
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('obats.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_obat' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); // Store in public disk
    }

    Obat::create([
        'nama_obat' => $request->nama_obat,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'image' => $imagePath,
        'terlaris' => $request->terlaris ?? false,
        'weight' => $request->weight ?? 0,
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('obats.index')->with('success', 'Obat created successfully');
}
     // Show the form to edit an existing Obat
     public function edit($id)
     {
         $obat = Obat::findOrFail($id);
         $brands = Brand::all();
         $categories = Category::all();
 
         return view('obats.edit', compact('obat', 'brands', 'categories'));
     }
 
     // Update an existing Obat
     public function update(Request $request, $id)
{
    $request->validate([
        'nama_obat' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'brand_id' => 'required|exists:brands,id',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
    ]);

    $obat = Obat::findOrFail($id);

    $imagePath = $obat->image; // Keep the existing image path

    if ($request->hasFile('image')) {
        // If new image is uploaded, store it
        $imagePath = $request->file('image')->store('images', 'public');
    }

    $obat->update([
        'nama_obat' => $request->nama_obat,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'image' => $imagePath,
        'terlaris' => $request->terlaris ?? $obat->terlaris,
        'weight' => $request->weight ?? $obat->weight,
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('obats.index')->with('success', 'Obat updated successfully');
}
    // Menghapus obat
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('obats.index');
    }
}