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
        Schema::create('part_exchanges', function (Blueprint $table) {
            $table->id();
            $table->longText('full_name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('brand');
            $table->string('model');
            $table->string('variant')->nullable();
            $table->string('color')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('registration')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('millage');
            $table->date('last_serviced')->nullable();
            $table->string('transmission')->nullable();
            $table->string('full_service_history')->nullable();
            $table->longText('optional')->nullable();
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
        Schema::dropIfExists('part_exchanges');
    }
};
