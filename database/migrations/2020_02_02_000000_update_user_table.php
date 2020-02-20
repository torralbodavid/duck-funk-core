<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    public function up()
    {
        DB::connection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('password', 255)->nullable()->change();
                $table->string('mail', 255)->change();
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('password', 64)->nullable(false)->change();
                $table->string('mail', 50)->change();
            });
        }
    }
}
