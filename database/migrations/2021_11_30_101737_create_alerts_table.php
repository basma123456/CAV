<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sender_id");
            $table->unsignedBigInteger("to_customer")->nullable();
            $table->unsignedBigInteger("to_employee")->nullable();
            $table->unsignedBigInteger("deal_id");
            $table->text("msg");
            $table->enum('sendTo' , ['customer','employee']);
            $table->boolean("readable");
            $table->timestamps();
            $table->foreign("sender_id")->references("id")->on("admins")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("to_customer")->references("id")->on("customers")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("to_employee")->references("id")->on("employees")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("deal_id")->references("id")->on("deals")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerts');
    }
}
