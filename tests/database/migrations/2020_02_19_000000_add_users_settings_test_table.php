<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersSettingsTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('users_settings', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->integer('user_id');
            $table->tinyInteger('welcome_flow_enabled');
            $table->tinyInteger('welcome_flow_step');
            $table->boolean('allow_name_change');
            $table->boolean('can_change_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_settings');
    }
}
