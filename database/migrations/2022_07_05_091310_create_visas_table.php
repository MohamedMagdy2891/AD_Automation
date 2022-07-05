<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('result', ['Pending', 'Approved', 'Rejected'])->default('Approved');
            $table->string('exp_date_year',2);
            $table->string('exp_date_month',2);
            $table->string('credit_card_type');
            $table->string('credit_card_number');
            $table->string('csv_number',3);
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
        Schema::dropIfExists('visas');
    }
}
