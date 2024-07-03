<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesPropertyRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_property_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties', 'id');
            $table->foreignId('features_property_id')->constrained('features_property' , 'id');
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
        Schema::dropIfExists('features_property_relationship');
    }
}
