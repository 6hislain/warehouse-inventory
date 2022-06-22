<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $transactions = Transaction::with("product")->simplePaginate(10);

        return view("transaction.index", compact("transactions"));
    }

    public function create()
    {
        $products = Product::all();

        return view("transaction.create", compact("products"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "type" => ["required", "in:stock in,stock out"],
            "product_id" => ["required"],
            "description" => ["required", "min:3"],
            "quantity" => ["required", "numeric"],
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->type == "stock in") {
            $unit_price = $product->buying_price;
        } else {
            $unit_price = $product->selling_price;
            $available_quantity = Transaction::where(
                "product_id",
                $product->id
            )->sum("quantity");

            if ($available_quantity < $request->quantity) {
                return back()
                    ->withErrors([
                        "quantity" =>
                            'quantity too high, you can\'t take out more than what we have',
                    ])
                    ->onlyInput("quantity");
            }
        }

        Transaction::create([
            "type" => $request->type,
            "quantity" => $request->quantity,
            "product_id" => $request->product_id,
            "description" => $request->description,
            "user_id" => auth()->user()->id,
            "unit_price" => $unit_price,
            "total" => $request->quantity * $unit_price,
        ]);

        return redirect()->route("transaction.index");
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route("transaction.index");
    }
}
