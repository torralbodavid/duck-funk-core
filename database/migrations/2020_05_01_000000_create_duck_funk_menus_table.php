<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuckFunkMenusTable extends Migration
{
    public function up()
    {
        Schema::create('duck_funk_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->integer('min_rank')->default(1);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });

        Schema::create('duck_funk_menus_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('menu_id');
            $table->bigInteger('page_id');
            $table->bigInteger('parent_id');
            $table->integer('order')->default(0);
            $table->string('external_url')->nullable()->default(null);
            $table->string('target')->default('_self');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('duck_funk_menus');
        Schema::drop('duck_funk_menus_items');
    }
}
