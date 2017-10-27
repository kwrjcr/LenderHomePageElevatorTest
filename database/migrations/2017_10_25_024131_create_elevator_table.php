<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elevator', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('signal', ['alarm', 'door open', 'door close']);
            $table->enum('direction', ['up', 'down', 'stand', 'maintenance']);
            $table->integer('currentFloor');
            $table->integer('destination');
            $table->boolean('active');
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
        Schema::dropIfExists('elevator');
    }
}
