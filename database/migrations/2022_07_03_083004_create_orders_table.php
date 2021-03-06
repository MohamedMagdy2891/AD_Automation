<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('visa_id')->references('id')->on('visas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('car_id')->references('id')->on('cars')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('receive_place')->references('id')->on('garages')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('deliver_place')->references('id')->on('garages')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamp('receive_time');
            $table->timestamp('deliver_time');
            $table->unsignedBigInteger('killometers_consumed')->nullable();
            $table->unsignedBigInteger('hours_consumed')->nullable();
            $table->double('extra_driver_price')->default(0);
            $table->double('shield_price')->default(0);
            $table->double('baby_seat_price')->default(0);
            $table->double('open_kilometers_price')->default(0);
            $table->double('total')->default(0);
            $table->string('reason_of_rejection')->nullable();
            $table->string('device')->default('mobile');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('order_status', ['Pending', 'Approved', 'Rejected','Completed'])->default('Pending');
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
        Schema::dropIfExists('orders');
    }
}
