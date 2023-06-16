<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('pages.dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.dashboard.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $slug_request = Str::slug($validatedData['name']);
        $code = random_int(1000, 9999);
        $slug = $code . '-' . $slug_request;

        $category = new Category;
        $category->slug = $slug;
        $category->name = $validatedData['name'];
        $category->save();
        return redirect('dashboard/categories')->with('message', 'Category Has Added');
    }

    public function edit(Category $category)
    {
        return view('pages.dashboard.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($category);
        $category->name = $validatedData['name'];
        $category->update();
        return redirect('dashboard/categories')->with('message', 'Category update Succesfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('dashboard/categories')->with('status', 'Category Delete Successfully');
    }
}
