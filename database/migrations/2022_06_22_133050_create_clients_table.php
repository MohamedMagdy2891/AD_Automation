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
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('license_id')->unique();
            $table->longText('license_image')->nullable();
            $table->unsignedBigInteger('ccountry_id');
            $table->foreign('ccountry_id')->on('countries')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('verification_code')->nullable();
            $table->boolean('verification_status')->default(false);
            $table->longText('photo')->nullable();

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
