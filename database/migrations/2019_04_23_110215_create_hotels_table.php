<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_fa');
            $table->string('name_en');
            $table->string('slug');
            $table->string('image');
            $table->string('video');
            $table->text('description');
            $table->integer('city_id');
            $table->integer('country_id');
            $table->string('rates');
            $table->integer('area_id');
            $table->integer('attractions_id');
            $table->integer('provider_id');
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
        Schema::dropIfExists('hotels');
    }
}
