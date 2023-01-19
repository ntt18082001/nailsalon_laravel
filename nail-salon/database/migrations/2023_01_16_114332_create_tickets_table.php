<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cus_id')->nullable();
            $table->string('cus_name');
            $table->string('cus_phone');
            $table->string('cus_email');
            $table->string('cus_note');
            $table->decimal('total');
            $table->integer('status_id');
            $table->unsignedBigInteger('employee_id');
            $table->dateTime('update_at');
            $table->bigInteger('start_at');
            $table->bigInteger('end_at');
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
        Schema::dropIfExists('tickets');
    }
}
