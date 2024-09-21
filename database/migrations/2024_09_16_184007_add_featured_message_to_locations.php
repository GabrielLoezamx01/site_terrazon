<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturedMessageToLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            if (!Schema::hasColumn('locations', 'featured_title')) {
                $table->string('featured_title')->nullable();
            }
            if (!Schema::hasColumn('locations', 'featured_msg')) {
                $table->string('featured_msg')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            if (Schema::hasColumn('locations', 'featured_title')) {
                $table->dropColumn('featured_title');
            }
            if (Schema::hasColumn('locations', 'featured_msg')) {
                $table->dropColumn('featured_msg');
            }
        });
    }
}
