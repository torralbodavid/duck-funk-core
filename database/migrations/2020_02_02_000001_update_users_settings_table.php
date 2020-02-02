<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            $table->boolean('welcome_flow_enabled')->default(1);
            $table->tinyInteger('welcome_flow_step')->default(1);
        });
    }

    public function down()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            $table->dropColumn('welcome_flow_enabled');
            $table->dropColumn('welcome_flow_step');
        });
    }
}
