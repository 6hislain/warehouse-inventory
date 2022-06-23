<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(["settings", "update", "logout"]);
    }

    public function show(User $user)
    {
        $product_count = Product::where("user_id", $user->id)->count();
        $category_count = Category::where("user_id", $user->id)->count();
        $transaction_count = Transaction::where("user_id", $user->id)->count();

        return view(
            "user.show",
            compact([
                "user",
                "product_count",
                "category_count",
                "transaction_count",
            ])
        );
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }

        return back()
            ->withErrors([
                "email" => "The provided credentials do not match our records.",
            ])
            ->onlyInput("email");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("home");
    }

    public function login()
    {
        return view("user.login");
    }

    public function register()
    {
        return view("user.register");
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:3", "confirmed"],
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ]);
        $request->session()->regenerate();

        return redirect()->intended("dashboard");
    }

    public function update(Request $request, User $user)
    {
        $request->validate(["name" => ["required", "min:3"]]);

        if (!empty($request->file("image"))) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $user->image = $request->file("image")->store("public/profile");
        }

        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();

        return redirect()->route("dashboard");
    }

    public function settings()
    {
        return view("user.settings");
    }
}
