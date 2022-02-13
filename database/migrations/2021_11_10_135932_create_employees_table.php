<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->string("email")->unique();
            $table->string("phone",11)->unique();
            $table->string("nid",14)->unique();
            $table->string("password");
            $table->string('personal_id',10)->unique();
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->string('avatar')->nullable();
            $table->string('pic_nid');
            $table->unsignedBigInteger("department_id");
            $table->boolean("status")->default(1);
            $table->string("roles");
            $table->integer("balance")->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade")->cascadeOnUpdate();
            $table->foreign("department_id")->references("id")->on("departments")->onDelete("cascade")->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
