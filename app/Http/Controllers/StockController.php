<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->latest()->get();
        return view('stock.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->type == 'keluar' && $product->stock < $request->quantity) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        Stock::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
        ]);

        if ($request->type == 'masuk') {
            $product->stock += $request->quantity;
        } else {
            $product->stock -= $request->quantity;
        }

        $product->save();

        return redirect()->route('stock.index')->with('success', 'Stok berhasil ditambahkan');
    }
}