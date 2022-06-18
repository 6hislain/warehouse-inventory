<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $categories = Category::with('user')->simplePaginate(20);

        return view("category.index", compact("categories"));
    }

    public function create()
    {
        return view("category.create");
    }

    public function edit(Category $category)
    {
        return view("category.edit", compact("category"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
        ]);

        Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => auth()->user()->id,
        ]);

        return redirect()->route("category.index");
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => ["required", "min:3", "max:100", "unique:users"],
            "description" => ["required", "min:3"],
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect()->route("category.index");
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route("category.index");
    }
}
