<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('estates', function (Blueprint $table) {
            $table->integer('room_option_id')->unsigned();
            $table->foreign('room_option_id', 'estates_room_option_foreign_key')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estates', function (Blueprint $table) {
            $table->dropForeign('estates_room_option_foreign_key');
            $table->dropColumn('room_option_id');
        });

        Schema::dropIfExists('room_options');
    }
}
