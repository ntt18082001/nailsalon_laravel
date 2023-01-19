<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColNulable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nail_services', function (Blueprint $table) {
            $table->decimal('discount_price')->nullable()->change();
            $table->dateTime('discount_from')->nullable()->change();
            $table->dateTime('discount_to')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nail_services', function (Blueprint $table) {
            //
        });
    }
}
