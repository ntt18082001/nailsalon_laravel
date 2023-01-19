<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nail_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cover_path');
            $table->string('description');
            $table->integer('duration');
            $table->decimal('price');
            $table->decimal('discount_price');
            $table->dateTime('discount_from');
            $table->dateTime('discount_to');
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
        Schema::dropIfExists('nail_services');
    }
}
