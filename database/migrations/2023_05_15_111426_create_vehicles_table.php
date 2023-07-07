<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('v_id');
            $table->string('brand');
            $table->string('model');
            $table->integer('condition');
            $table->double('millage');
            $table->string('fuel_type');
            $table->integer('transmission');
            $table->string('body_style');
            $table->string('mpg');
            $table->string('engine_size');
            $table->date('first_registered');
            $table->string('color');
            $table->double('price');
            $table->string('power');
            $table->string('co2_emission');
            $table->string('road_tax');
            $table->string('main_img')->nullable();
            $table->longText('overview');
            $table->integer('status');
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
        Schema::dropIfExists('vehicles');
    }
};
