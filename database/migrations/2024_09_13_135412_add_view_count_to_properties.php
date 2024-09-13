<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewCountToProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            if (!Schema::hasColumn('properties', 'view_count')) {
                $table->integer('view_count')->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            if (Schema::hasColumn('properties', 'view_count')) {
                $table->dropColumn('view_count');
            }
        });
    }
}
