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
        $transactions = Transaction::with(["user", "product"])->simplePaginate(
            10
        );

        return view("transaction.index", compact("transactions"));
    }

    public function create()
    {
        $products = Product::all();

        return view("transaction.create", compact("products"));
    }

    public function edit(Transaction $transaction)
    {
        $products = Product::all();

        return view("transaction.edit", compact(["products", "transaction"]));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
        ]);

        Transaction::create([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route("transaction.index");
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
        ]);

        $transaction->name = $request->name;
        $transaction->description = $request->description;
        $transaction->user_id = auth()->user()->id;
        $transaction->save();

        return redirect()->route("transaction.index");
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route("transaction.index");
    }
}
