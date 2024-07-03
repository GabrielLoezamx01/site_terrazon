<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionPropertyRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condition_property_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties', 'id');
            $table->foreignId('condition_id')->constrained('condition_property', 'id');
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
        Schema::dropIfExists('condition_property_relationship');
    }
}
