<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitchenOrderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('kitchen_order', function (Blueprint $table) {
            $table->unsignedBigInteger('kitchen_id');
            $table->foreign('kitchen_id', 'kitchen_id_fk_3343194')->references('id')->on('kitchens')->onDelete('cascade');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_3343194')->references('id')->on('orders')->onDelete('cascade');
        });
    }
}