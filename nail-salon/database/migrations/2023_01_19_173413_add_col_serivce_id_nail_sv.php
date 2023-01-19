<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColSerivceIdNailSv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nail_services', function (Blueprint $table) {
            $table->unsignedBigInteger('service_cate_id');
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
            $table->dropColumn('service_cate_id');
        });
    }
}
