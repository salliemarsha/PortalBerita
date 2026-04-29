<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use Illuminate\Http\Request;

class StockInController extends Controller
{
   public function store(Request $request)
{
    StockIn::create($request->all());

    $product = Product::find($request->product_id);
    $product->stock += $request->quantity;
    $product->save();

    return back();
}
}
