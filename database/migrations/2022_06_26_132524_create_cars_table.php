<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->string('code');
            $table->integer('color');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->on('car_statuses')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->on('car_models')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('garage_id');
            $table->foreign('garage_id')->on('garages')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->on('car_categories')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('car_model_year');   //موديل السيارة
            $table->integer('no_doors');    //عدد الابواب
            $table->integer('no_bags'); //عدد الحقائب
            $table->string('car_type'); //اتوماتيك . يدوي

            /*----------------*/
            $table->double('price_per_hour')->default(0.00);
            $table->integer('discount_per_hour')->default(0);
            $table->integer('discount_price_per_hour')->default(0.00);
            /*----------------*/
            $table->double('price_per_half_day')->default(0.00);
            $table->integer('discount_per_half_day')->default(0);
            $table->double('discount_price_per_half_day')->default(0.00);
            /*----------------*/
            $table->double('price_per_day')->default(0.00);
            $table->integer('discount_per_day')->default(0);
            $table->double('discount_price_per_day')->default(0.00);


            /*----------------*/
            $table->boolean('insurance')->default(false);
            $table->double('insurance_price')->default(0);

            /*----------------*/
            $table->boolean('extra_driver')->default(false);
            $table->double('extra_driver_price')->default(0.00);

            /*----------------*/
            $table->boolean('shield')->default(false);
            $table->double('shield_price')->default(0.00);

            /*----------------*/
            $table->boolean('baby_seat')->default(false);
            $table->double('baby_seat_price')->default(0.00);

            /*----------------*/
            $table->boolean('open_kilometers')->default(false);
            $table->double('open_kilometers_price')->default(0.00);



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
        Schema::dropIfExists('cars');
    }
}
