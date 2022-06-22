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
		$product_count = Product::where("user_id", auth()->user()->id)->count();
		$category_count = Category::where("user_id", auth()->user()->id)->count();

		$stock_in_count = Transaction::where([
			["user_id", auth()->user()->id],
			["type", "stock in"],
		])->count();

		$stock_out_count = Transaction::where([
			["user_id", auth()->user()->id],
			["type", "stock out"],
		])->count();

		$stock_in_total = Transaction::where([
			["user_id", auth()->user()->id],
			["type", "stock in"],
		])->sum("total");

		$stock_out_total = Transaction::where([
			["user_id", auth()->user()->id],
			["type", "stock out"],
		])->sum("total");

		return view(
			"dashboard",
			compact([
				"product_count",
				"category_count",
				"stock_in_count",
				"stock_in_total",
				"stock_out_count",
				"stock_out_total",
			])
		);
	}
}
