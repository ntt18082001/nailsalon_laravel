<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnNailService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nail_services', function (Blueprint $table) {
            $table->dropColumn(['discount_price', 'discount_from', 'discount_to']);
            $table->renameColumn('price', 'price_couleur');
            $table->decimal('price_naturel')->nullable();
            $table->decimal('price_french')->nullable();
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
