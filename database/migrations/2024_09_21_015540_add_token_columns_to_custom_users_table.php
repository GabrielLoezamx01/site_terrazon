<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenColumnsToCustomUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_users', function (Blueprint $table) {
            $table->string('token')->nullable();
            $table->timestamp('token_expirado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_users', function (Blueprint $table) {
            $table->dropColumn(['token', 'token_expirado']);
        });
    }
}
