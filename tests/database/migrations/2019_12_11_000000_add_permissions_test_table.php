<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionsTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('id');
            $table->string('rank_name', 25);
            $table->string('prefix', 5);
            $table->string('prefix_color', 7);
            $table->boolean('duck_funk_housekeeping_read');
            $table->boolean('duck_funk_housekeeping_write');
            $table->boolean('duck_funk_housekeeping_approve');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
