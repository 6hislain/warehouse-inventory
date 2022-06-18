<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(DefaultController::class)->group(function () {
    Route::get("/", "index")->name("home");
    Route::get("/about", "about")->name("about");
    Route::get("/dashboard", "dashboard")->name("dashboard");
});

Route::prefix("category")
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get("/", "index")->name("category.index");
        Route::get("/create", "create")->name("category.create");
        Route::post("/", "store")->name("category.store");

        Route::get("/{category}", "show")
            ->whereNumber("category")
            ->name("category.show");

        Route::get("/{category}/edit", "edit")
            ->whereNumber("category")
            ->name("category.edit");

        Route::put("/{category}", "update")
            ->whereNumber("category")
            ->name("category.update");

        Route::delete("/{category}", "destroy")
            ->whereNumber("category")
            ->name("category.destroy");
    });

Route::prefix("product")
    ->controller(ProductController::class)
    ->group(function () {
        Route::get("/", "index")->name("product.index");
        Route::get("/create", "create")->name("product.create");
        Route::post("/", "store")->name("product.store");

        Route::get("/{product}", "show")
            ->whereNumber("product")
            ->name("product.show");

        Route::get("/{product}/edit", "edit")
            ->whereNumber("product")
            ->name("product.edit");

        Route::put("/{product}", "update")
            ->whereNumber("product")
            ->name("product.update");

        Route::delete("/{product}", "destroy")
            ->whereNumber("product")
            ->name("product.destroy");
    });

Route::prefix("transaction")
    ->controller(TransactionController::class)
    ->group(function () {
        Route::get("/", "index")->name("transaction.index");
        Route::get("/create", "create")->name("transaction.create");
        Route::post("/", "store")->name("transaction.store");

        Route::get("/{transaction}", "show")
            ->whereNumber("transaction")
            ->name("transaction.show");

        Route::get("/{transaction}/edit", "edit")
            ->whereNumber("transaction")
            ->name("transaction.edit");

        Route::put("/{transaction}", "update")
            ->whereNumber("transaction")
            ->name("transaction.update");

        Route::delete("/{transaction}", "destroy")
            ->whereNumber("transaction")
            ->name("transaction.destroy");
    });

Route::controller(UserController::class)->group(function () {
    Route::get("/login", "login")->name("login");
    Route::post("/login", "authenticate")->name("authenticate");
    Route::get("/logout", "logout")->name("logout");
    Route::get("/register", "register")->name("register");
    Route::post("/register", "save")->name("user.save");

    Route::get("/user/{user}", "show")
        ->whereNumber("user")
        ->name("user.show");

    Route::get("/user/{user}/edit", "edit")
        ->whereNumber("user")
        ->name("user.edit");

    Route::put("/user/{user}", "update")
        ->whereNumber("user")
        ->name("user.update");
});
