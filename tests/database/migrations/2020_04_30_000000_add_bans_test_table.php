<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBansTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('bans', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedInteger('user_id');
            $table->string('ip');
            $table->string('machine_id');
            $table->integer('user_staff_id');
            $table->integer('timestamp');
            $table->integer('ban_expire');
            $table->string('ban_reason');
            $table->enum('type', ['account','ip','machine','super']);
            $table->integer('cfh_topic');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bans');
    }
}
