<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('fn_name');
            $table->string('ln_name');
            $table->string('phone');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('country_id')->index();
            $table->foreign('country_id')->on('countries')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->longText('address');
            $table->longText('photo')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->boolean('verification_status')->default(false);
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
        Schema::dropIfExists('clients');
    }
}
