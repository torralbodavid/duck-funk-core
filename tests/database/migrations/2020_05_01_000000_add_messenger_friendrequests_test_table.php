<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessengerFriendrequestsTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('messenger_friendrequests', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedInteger('user_to_id');
            $table->unsignedInteger('user_from_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messenger_friendrequests');
    }
}
