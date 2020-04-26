<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuckFunkPagesTable extends Migration
{
    public function up()
    {
        Schema::create('duck_funk_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable(false);
            $table->string('slug', 255)->nullable(false);
            $table->string('route', 255)->nullable(false);
            $table->string('meta_title', 255)->nullable(false);
            $table->string('meta_description', 255)->nullable(false);
            $table->unsignedBigInteger('min_rank');
            $table->unsignedBigInteger('parent_id');
            $table->boolean('active')->default(1)->nullable(false);
            $table->boolean('no_robots')->default(0)->nullable(false);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('duck_funk_pages');
    }
}
