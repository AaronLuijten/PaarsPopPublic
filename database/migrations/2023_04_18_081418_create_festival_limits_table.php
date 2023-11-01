<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_limits', function (Blueprint $table) {
            $table->id();
            $table->integer('accomodation_max_width');
            $table->integer('accomodation_max_lenght');
            $table->integer('festival_max_accomodations');
            $table->integer('festival_max_grass_space');
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
        Schema::dropIfExists('festival_limits');
    }
}
