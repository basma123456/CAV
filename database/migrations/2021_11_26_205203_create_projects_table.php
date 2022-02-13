<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("plan_id")->nullable();
            $table->unsignedBigInteger("deal_id");
            $table->unsignedBigInteger("programing_id")->nullable();
            $table->integer("plan_price");
            $table->string("discount")->nullable();
            $table->enum("discount_type",['percentage','fixed'])->nullable();
            $table->enum('project_status',['Pending','On Work','Finish']);

            $table->timestamps();

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("programing_id")->references("id")->on("employees")->onDelete("cascade")->cascadeOnUpdate();
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
        Schema::dropIfExists('projects');
    }
}
