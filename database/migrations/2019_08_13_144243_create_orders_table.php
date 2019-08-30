<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',120)->nullable();
            $table->string('last_name',120)->nullable();
            $table->string('email',120)->nullable();
            $table->string('phone',120)->nullable();
            $table->text('order_detail')->nullable();
            $table->text('order_comment')->nullable();
            $table->integer('status_id')->default('1')->unsigned();
            $table->string('order_file')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
