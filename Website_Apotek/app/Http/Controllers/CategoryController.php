<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display a listing of the categories
    public function index()
    {
        $categories = Category::all(); // Get all categories
        return view('categories.index', compact('categories')); // Pass to the view
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('categories.create'); // Return the create form view
    }

    // Store a newly created category in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules
        ]);

        Category::create($request->all()); // Create the category

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    // Show the form for editing the specified category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); // Return edit form view
    }

    // Update the specified category in storage
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validation rules
        ]);

        $category->update($request->all()); // Update the category

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    // Remove the specified category from storage
    public function destroy(Category $category)
    {
        $category->delete(); // Delete the category

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
