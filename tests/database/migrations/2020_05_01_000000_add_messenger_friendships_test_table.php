<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessengerFriendshipsTestTable extends \Illuminate\Database\Migrations\Migration
{
    public function up()
    {
        Schema::create('messenger_friendships', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->unsignedInteger('user_one_id');
            $table->unsignedInteger('user_two_id');
            $table->unsignedInteger('relation');
            $table->unsignedInteger('friends_since');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messenger_friendrequests');
    }
}
