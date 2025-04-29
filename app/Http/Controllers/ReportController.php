<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\ProductMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    public function productBalance()
    {
        $movements = ProductMovement::with(['product', 'fromLocation', 'toLocation'])
        ->get();
    
    $balanceMap = [];
    
    foreach ($movements as $movement) {
        if ($movement->to_location) {
            $key = $movement->product_id . '-' . $movement->to_location;
            if (!isset($balanceMap[$key])) {
                $balanceMap[$key] = [
                    'product_id' => $movement->product_id,
                    'product' => $movement->product->name,
                    'warehouse_id' => $movement->to_location,
                    'warehouse' => $movement->toLocation->name,
                    'qty' => 0
                ];
            }
            $balanceMap[$key]['qty'] += $movement->qty;
        }
        
        if ($movement->from_location) {
            $key = $movement->product_id . '-' . $movement->from_location;
            if (!isset($balanceMap[$key])) {
                $balanceMap[$key] = [
                    'product_id' => $movement->product_id,
                    'product' => $movement->product->name,
                    'warehouse_id' => $movement->from_location,
                    'warehouse' => $movement->fromLocation->name,
                    'qty' => 0
                ];
            }
            $balanceMap[$key]['qty'] -= $movement->qty;
        }
    }
    
    $balances = Collection::make(array_values($balanceMap))
        ->values()->all();
    
    return view('report.report-product', compact('balances'));
       

    }
}
