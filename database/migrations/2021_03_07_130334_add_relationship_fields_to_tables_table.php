<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTablesTable extends Migration
{
    public function up()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id', 'team_fk_3343172')->references('id')->on('teams');
        });
    }
}