<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $products = Product::where(
            "user_id",
            auth()->user()->id
        )->simplePaginate(8);

        return view("product.index", compact("products"));
    }

    public function create()
    {
        $categories = Category::all()->where("user_id", auth()->user()->id);

        return view("product.create", compact("categories"));
    }

    public function edit(Product $product)
    {
        $categories = Category::all()->where("user_id", auth()->user()->id);

        return view("product.edit", compact(["product", "categories"]));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
            "buying_price" => ["required", "min:1", "lte:selling_price"],
            "selling_price" => ["required", "gte:buying_price"],
            "category_id" => ["required", "numeric"],
            "currency" => ["required", "in:usd,eur,gbp"],
            "image" => [
                "required",
                "image",
                "mimes:jpg,png,jpeg,gif,svg",
                "max:2048",
            ],
        ]);

        Product::create([
            "name" => $request->name,
            "selling_price" => $request->selling_price,
            "buying_price" => $request->buying_price,
            "category_id" => $request->category_id,
            "currency" => $request->currency,
            "description" => $request->description,
            "image" => $request->file("image")->store("public/product"),
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route("product.index");
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
            "buying_price" => ["required", "min:1", "lte:selling_price"],
            "selling_price" => ["required", "gte:buying_price"],
            "category_id" => ["required", "numeric"],
            "currency" => ["required", "in:usd,eur,gbp"],
            "image" => ["image", "mimes:jpg,png,jpeg,gif,svg", "max:2048"],
        ]);

        if (!empty($request->file("image"))) {
            Storage::delete($product->image);
            $product->image = $request->file("image")->store("public/product");
        }

        $product->name = $request->name;
        $product->selling_price = $request->selling_price;
        $product->buying_price = $request->buying_price;
        $product->category_id = $request->category_id;
        $product->currency = $request->currency;
        $product->description = $request->description;
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect()->route("product.index");
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        return redirect()->route("product.index");
    }
}
