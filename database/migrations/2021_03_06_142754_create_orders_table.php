<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total', 15, 2);
            $table->string('customer');
            $table->integer('quantity');
            $table->string('order_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}