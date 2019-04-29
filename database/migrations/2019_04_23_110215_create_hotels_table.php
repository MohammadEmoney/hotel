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
            $table->text('image');
            $table->string('video');
            $table->text('description')->nullable();
            $table->float('lat', 10, 7);
            $table->float('long', 10, 7);
            $table->integer('rates');

            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');

            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');

            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')
                ->on('areas')->onDelete('cascade');

            $table->integer('attractions_id')->unsigned()->nullable();
            $table->foreign('attractions_id')->references('attraction_id')
                ->on('attraction_hotel')->onDelete('cascade');

            $table->integer('provider_id')->unsigned()->nullable();
            $table->foreign('provider_id')->references('id')
                ->on('providers')->onDelete('cascade');
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
