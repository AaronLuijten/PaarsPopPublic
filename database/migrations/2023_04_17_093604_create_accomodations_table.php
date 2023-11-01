<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('accomodation_type')->nullable();
            $table->boolean('presence');
            $table->boolean('stay_over');
            $table->integer('accomodation_length')->nullable();
            $table->integer('accomodation_width')->nullable();
            $table->integer('number_of_guests_weekend')->nullable();
            $table->integer('number_of_guest_sat')->nullable();
            $table->integer('number_of_guest_sun')->nullable();
            $table->boolean('dinner_sat');
            $table->boolean('brunch_sun');
            $table->boolean('dinner_sun');  
            $table->integer('user_id');
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
        Schema::dropIfExists('accomodations');
    }
}
