<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("image")->nullable();
            $table->text("description");
            $table->float("buying_price")->default(1);
            $table->float("selling_price")->default(1);
            $table->enum("currency", ["usd", "eur", "gbp"])->default("usd");
            $table
                ->foreignId("category_id")
                ->constrained("categories")
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("products");
    }
};
