<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Estate\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->paginate(20);

        return $categories;
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        return $category;
    }

    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validated();

        $category->update($data);

        return $category;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['success' => true], 200);
    }
}
