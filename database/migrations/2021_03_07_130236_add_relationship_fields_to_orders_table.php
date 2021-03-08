<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3343020')->references('id')->on('teams');
            $table->unsignedBigInteger('table_id');
            $table->foreign('table_id', 'table_fk_3343176')->references('id')->on('tables');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_3343192')->references('id')->on('products');
        });
    }
}