<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->integer('rank');
            $table->string('username', 25);
            $table->string('password', 64);
            $table->string('mail', 50);
            $table->integer('account_created');
            $table->timestamp('last_login');
            $table->string('ip_register', 45);
            $table->string('ip_current', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
