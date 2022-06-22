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
        Schema::create("transactions", function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("quantity");
            $table->enum("type", ["stock in", "stock out"]);
            $table->float("unit_price");
            $table->float("total");
            $table->text("description");
            $table
                ->foreignId("product_id")
                ->constrained("products")
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
        Schema::dropIfExists("transactions");
    }
};
