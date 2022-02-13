<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer("plan_price");
            $table->string("discount")->nullable();
            $table->enum("discount_type",['percentage','fixed'])->nullable();
            $table->timestamps();
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
