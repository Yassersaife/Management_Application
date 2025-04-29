<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovementRequest;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductMovement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = ProductMovement::with('product')->orderBy("created_at","desc")->get();
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
        try{
            $movements=$request->validated();
            $movements['movement_id'] = $request->movement_id ??Str::uuid();
            if($request->from_location == null && $request->to_location == null){
             return back()->withErrors(['movement'=>'Please select at least one location.']);
            }

            if($request->from_location)
            {
                $locationInputBalance = ProductMovement::where("product_id", $request->product_id)->where("to_location", $request->from_location)->sum("qty");
                $locationOutputBalance = ProductMovement::where("product_id", $request->product_id)->where("from_location", $request->from_location)->sum("qty");
                $total = $locationInputBalance - $locationOutputBalance;
                if($total < $request->qty){
                    return back()->withErrors(["movement" => "there is no enough balance in the location"]);
                }
            }

            ProductMovement::create($movements);
              return redirect()->route('movements.index')->with('success', 'Movement created successfully.');
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json(["error" => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductMovement $movement)
    {
        return view('movements.show', compact('movement'));
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductMovement $movement)
    {
        $products = Product::all();
        $locations = Location::all();
        return view('movements.edit', compact('movement', 'products', 'locations'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMovementRequest $request,ProductMovement $movement)
    {
        $movements=$request->validated();
        $movements['movement_id'] =$movement->movement_id;
        if($request->from_location == null && $request->to_location == null){
            return redirect()->back()->with('error', 'Please select at least one location.');
           }
           $movement->update($movements);
           return redirect()->route('movements.index')->with('success', 'Movement updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductMovement $movement)
    {
        $movement->delete();
        return redirect()->route('movements.index')->with('success', 'Movement deleted successfully.');
    }
}
