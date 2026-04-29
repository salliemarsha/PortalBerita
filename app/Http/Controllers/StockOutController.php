<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Product;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function store(Request $request)
{
    $product = Product::find($request->product_id);

    if ($product->stock < $request->quantity) {
        return back()->with('error','Stok tidak cukup');
    }

    StockOut::create($request->all());

    $product->stock -= $request->quantity;
    $product->save();

    return back();
}
}
