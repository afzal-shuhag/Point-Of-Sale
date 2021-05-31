<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('code')->nullable();
            $table->string('role_two')->nullable()->comment('Admin = Head Of Software, Operator = Computer Operator, User = Employee');
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

            // $table->bigIncrements('id');
            // $table->string('role')->nullable();
            // $table->string('name')->nullable();
            // $table->string('email')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->string('mobile')->nullable();
            // $table->string('address')->nullable();
            // $table->string('gender')->nullable();
            // $table->string('image')->nullable();
            // $table->string('fname')->nullable();
            // $table->string('mname')->nullable();
            // $table->string('religion')->nullable();
            // $table->string('id_no')->nullable();
            // $table->date('dob')->nullable();
            // $table->string('code')->nullable();
            // $table->string('role_two')->nullable()->comment('Admin = Head Of Software, Operator = Computer Operator, User = Employee');
            // $table->date('join_date')->nullable();
            // $table->integer('designation_id')->nullable();
            // $table->double('salary')->nullable();
            // $table->tinyInteger('status')->default(1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
