<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|unique:products|max:255',
            'name' => 'required',
        ]);
        Product::created([
            'product_id'=>$request->product_id ?? Str::uuid(),
            'name'=>$request->name,
        ]);
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
      
        return view('products.show',compact('product'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        
        return view('products.edit',compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->vaildate([
            'name' => 'required|string|max:255',
        ]);
       
            $product->update([
                'name'=>$request->name,
            ]);
            return redirect()->route('products.index')->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully.');
    }
}

