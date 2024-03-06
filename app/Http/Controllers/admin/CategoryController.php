<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        Category::create([
            'name' => $request->category
        ]);

        return redirect()->back()->with('status' , 'Category added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , string $id)
    {
        $request->validate([
            'category' =>'required',
            'cat_id' => 'required|exists:categories,id',
        ]);
        $category = Category::findOrFail($request->cat_id);

        $category->update([
            'name' => $request->category
        ]);


        return redirect()->back()->with('status', 'Category updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('status', 'Category deleted Successfully');
    }
}
