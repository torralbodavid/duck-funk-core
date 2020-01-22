<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('duck_funk_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 155);
            $table->string('subtitle', 255);
            $table->text('body');
            $table->json('categories')->nullable();
            $table->string('image_link', 255)->nullable();
            $table->integer('hotelview_news_id')->default(null)->nullable();
            $table->boolean('draft')->default(false);
            $table->unsignedBigInteger('author');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('duck_funk_news');
    }
}
