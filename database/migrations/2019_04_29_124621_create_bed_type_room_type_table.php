<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedTypeRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_type_room_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bed_type_id')->unsigned();
            $table->foreign('bed_type_id')
                ->references('id')
                ->on('bed_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')
                ->references('id')
                ->on('room_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['room_type_id', 'bed_type_id']);
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
        Schema::dropIfExists('bed_room');
    }
}
