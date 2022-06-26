<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string('ar_garage');
            $table->string('en_garage');
            $table->longText('ar_address');
            $table->longText('en_address');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->on('regions')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('lat');
            $table->string('lang');
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
        Schema::dropIfExists('garages');
    }
}
