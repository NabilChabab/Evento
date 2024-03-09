<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

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

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('status', 'Category deleted Successfully');
    }
}
