<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cus_id')->nullable();
            $table->unsignedBigInteger('bill_id');
            $table->integer('discount');
            $table->integer('booking_no')->default(0);
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
        Schema::dropIfExists('customer_promotions');
    }
}
