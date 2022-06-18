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
		$productCount = Product::count();
		$categoryCount = Category::count();
		$stockInCount = Transaction::where("type", "stock in")->count();
		$stockOutCount = Transaction::where("type", "stock out")->count();

		return view(
			"dashboard",
			compact([
				"productCount",
				"categoryCount",
				"stockInCount",
				"stockOutCount",
			])
		);
	}
}
