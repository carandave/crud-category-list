<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::paginate(3);

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'nullable'
        ]);



        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $request->status == true ? 1 : 0
        ]);

        return redirect()->route('category.index')->with('success_store', "Category Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('category.show', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'nullable'
        ]);

        $category->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'status' => $request->status == true ? 1 : 0
        ]);

        return redirect()->route('category.index')->with('success_update', "Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();

        return redirect()->route('category.index')->with('success_delete', "Category Deleted Successfully");
    }
}
