<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsPropertyRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_property_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties', 'id');
            $table->foreignId('detail_id')->constrained('details_property', 'id');
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
        Schema::dropIfExists('details_property_relationship');
    }
}
