<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index()
    {
        define('NUMBER_OF_ITEMS_PER_PAGE', 25);
        $categories = Category::paginate(NUMBER_OF_ITEMS_PER_PAGE);
        return inertia('Categories/Index', ['categories' => $categories]);
    }
    public function create()
    {
        return inertia('Categories/Create');
    }
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(Category $category)
    {
        return  inertia('Categories/Edit', [
            'category' => $category,
        ]);
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
