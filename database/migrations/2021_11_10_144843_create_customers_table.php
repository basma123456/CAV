<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("email")->unique();
            $table->string("password", 100);
            $table->string("phone")->unique();
            $table->string("nid")->unique();
            $table->string("address");
            $table->enum("customer_type",['personal','company']);
            $table->unsignedBigInteger("active_by")->nullable();
            $table->string('cr_no')->nullable();
            $table->string('pic_nid')->nullable();
            $table->boolean("status");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("active_by")->references("id")->on("admins")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
