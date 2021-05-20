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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('session_id');
            $table->string('token');
            $table->string('status');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('mobile', 10);
            $table->string('email');
            $table->string('line1');
            $table->string('line2');
            $table->string('city');
            $table->string('provide');
            $table->string('country');
            $table->text('content');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
