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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nameEvent', 254);
            $table->mediumText('descriptionEvent');
            $table->string('imageEvent')->nullable();
            $table->string('adressPlace')->nullable();
            $table->decimal('priceEvent', 10, 2);
            $table->dateTime('startDateEvent');
            $table->dateTime('endDateEvent');
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
        Schema::dropIfExists('events');
    }
};
