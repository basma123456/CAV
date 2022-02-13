<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string("deal_cost");
            $table->string("reward_percentage");
            $table->string("reward");
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('deal_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('admin_id');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign("seller_id")->references("id")->on("employees")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("deal_id")->references("id")->on("deals")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rewards');
    }
}
