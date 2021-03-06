<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
//            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('has_store')->default(false);
            $table->boolean('admin')->default(false);
//            $table->uuid('package_id');
//            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
//            $table->integer('products_threshold');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
