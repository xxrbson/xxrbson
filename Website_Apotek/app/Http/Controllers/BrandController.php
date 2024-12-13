<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Display a listing of the brands
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    // Show the form for creating a new brand
    public function create()
    {
        return view('brands.create');
    }

    // Store a newly created brand in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully');
    }

    // Show the form for editing the specified brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    // Update the specified brand in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:brands,name,' . $id,
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully');
    }

    // Remove the specified brand from the database
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully');
    }
}
