<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsPropertyRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics_property_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties', 'id');
            $table->foreignId('characteristic_id')->constrained('characteristics' , 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characteristics_property_relationship');
    }
}
