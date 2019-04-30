<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_hotel', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('attraction_id')->unsigned();
            $table->foreign('attraction_id')
                ->references('id')
                ->on('attractions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('attraction_hotel');
    }
}
