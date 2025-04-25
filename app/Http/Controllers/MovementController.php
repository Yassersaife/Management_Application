<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovementRequest;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = ProductMovement::with(['product', 'fromLocation', 'toLocation'])->get();
        return view('movements.index', compact('movements'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        $locations=Location::all();
        return view('movements.create', compact('products', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovementRequest $request)
    {
       $movements=$request->validated();
       $movements['movement_id'] = Str::uuid();
       $movements['timestamp'] = now();
       if($request->from_location == null && $request->to_location == null){
        return redirect()->back()->with('error', 'Please select at least one location.');
       }
       
       ProductMovement::create($movements);
         return redirect()->route('movements.index')->with('success', 'Movement created successfully.');
           
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductMovement $productMovement)
    {
        return view('movements.show', compact('productMovement'));
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductMovement $productMovement)
    {
        $products = Product::all();
        $locations = Location::all();
        return view('movements.edit', compact('productMovement', 'products', 'locations'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMovementRequest $request,ProductMovement $productMovement)
    {
        $movements=$request->validated();
        $movements['movement_id'] =$productMovement->movement_id;
        if($request->from_location == null && $request->to_location == null){
            return redirect()->back()->with('error', 'Please select at least one location.');
           }
         ProductMovement::update($movements);
           return redirect()->route('movements.index')->with('success', 'Movement updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductMovement $productMovement)
    {
        $productMovement->delete();
        return redirect()->route('movements.index')->with('success', 'Movement deleted successfully.');
    }
}
