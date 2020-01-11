<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->boolean('duck_funk_housekeeping_read');
            $table->boolean('duck_funk_housekeeping_write');
            $table->boolean('duck_funk_housekeeping_approve');
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('duck_funk_housekeeping_read');
            $table->dropColumn('duck_funk_housekeeping_write');
            $table->dropColumn('duck_funk_housekeeping_approve');
        });
    }
}
