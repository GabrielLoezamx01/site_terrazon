<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToCustomUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_users', function (Blueprint $table) {
            $table->string('gender')->nullable(); // Género
            $table->date('date_of_birth')->nullable(); // Fecha de nacimiento
            $table->unsignedBigInteger('occupation_id')->nullable(); // ID de ocupación
            $table->string('landline', 15)->nullable(); // Teléfono fijo
            $table->string('occupation')->nullable();
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
            $table->dropForeign(['occupation_id']); // Eliminar la clave foránea
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('occupation_id');
            $table->dropColumn('landline');
            $table->dropColumn('occupation');
        });
    }
}
