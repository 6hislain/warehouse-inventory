<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth")->only("dashboard");
	}

	public function index()
	{
		return view("welcome");
	}

	public function about()
	{
		return view("about");
	}

	public function dashboard()
	{
		$product_count = Product::count();
		$category_count = Category::count();
		$stock_in_count = Transaction::where("type", "stock in")->count();
		$stock_out_count = Transaction::where("type", "stock out")->count();

		return view(
			"dashboard",
			compact([
				"product_count",
				"category_count",
				"stock_in_count",
				"stock_out_count",
			])
		);
	}
}
