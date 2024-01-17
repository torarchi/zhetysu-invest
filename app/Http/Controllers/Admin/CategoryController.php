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
        $categories = Category::paginate(20);

        return $categories;
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(['success' => true]);
    }
}
