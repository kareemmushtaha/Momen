<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Reservation_item_id')->unsigned();
            $table->foreign('Reservation_item_id')->references('id')->on('items');
            $table->string('Reservation_start_date');
            $table->string('Reservation_end_date')->nullable();
            $table->string('Reservation_start_time');
            $table->string('Reservation_end_time');
            $table->string('Reservation_price')->nullable();
            $table->integer('Reservation_user_id')->unsigned();
            $table->foreign('Reservation_user_id')->references('id')->on('users');
            $table->enum('Reservation_overnight',['1','0']);
            $table->enum('Reservation_status',['pending','done','canceled']);
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
        Schema::dropIfExists('reservations');
    }
}