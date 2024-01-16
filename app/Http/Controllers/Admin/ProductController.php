<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category; 
use App\Http\Requests\Estate\ProductRequest; 

class ProductController extends Controller 
{
    public function index()
    {
        $products = Product::paginate(20); 
        return $products;
    }
    
    public function store(ProductRequest $request) 
    {
        $data = $request->validated();
    
        $product = Product::create($data); 
    
        return $product;
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }
    
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id); 
    
        $data = $request->validated();
    
        $product->update($data);
    
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();

        return response()->json(['success' => true], 200);
    }

    /* public function publicIndex(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        $subCategories = Category::where('parent_id', $categoryId)->get();
    
        $products = Product::whereIn('category_id', $subCategories->pluck('id'))->get();
        
        return response()->json([
            'sub_categories' => $subCategories->toArray(),
            'products' => $products->toArray(), 
        ], 200);
    }
    */
    

}
