<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->string("plan_image");
            $table->integer("plan_price");
            $table->string("discount")->nullable();
            $table->enum("discount_type",['percentage','fixed'])->nullable();
            $table->boolean("status");
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("sub_category_id");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("sub_category_id")->references("id")->on("sub_categories")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
