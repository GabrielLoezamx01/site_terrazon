<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('name');
            $table->text('url')->nullable();
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributions');
    }
}
