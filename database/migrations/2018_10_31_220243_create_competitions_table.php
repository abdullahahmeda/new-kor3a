<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            /* $table->integer('week'); */
            $table->integer('day');
            $table->timestamp('trip_at');
            $table->timestamp('finish_at');
            $table->integer('discount_percentage')/* ->nullable() */;
            $table->integer('available_tickets');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->string('direction');
            $table->string('starting_place');
            $table->string('finishing_place');
            $table->string('sponsor')->nullable();
            $table->string('status')->default('active');
            $table->string('transportation_company')->nullable();
            $table->string('booking_link');
            $table->string('result_phone');
            $table->string('banner')->nullable();
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
        Schema::dropIfExists('competitions');
    }
}
