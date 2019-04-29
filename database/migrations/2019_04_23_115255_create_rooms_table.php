<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->foreign('hotel_id')->refrences('id')
                    ->on('hotels')->onDelete('cascade');

            $table->integer('room_type_id')->unsigned()->nullable();
            $table->foreign('room_type_id')->refrences('id')
                    ->on('room_types')->onDelete('cascade');

            $table->integer('bed_type_id')->unsigned()->nullable();
            $table->foreign('bed_type_id')->refrences('id')
                    ->on('bed_types')->onDelete('cascade');

            $table->string('currency');
            $table->float('price');
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
        Schema::dropIfExists('rooms');
    }
}
