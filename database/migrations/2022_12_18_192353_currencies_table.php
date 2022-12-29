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
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id_currency')->comment("Przewalutować możemy jedynie PLN");
            $table->float('EUR_buy')->default(4.67);
            $table->float('EUR_sell')->default(4.68);
            $table->float('CHF_buy')->default(4.74);
            $table->float('CHF_sell')->default(4.74);
            $table->float('USD_buy')->default(4.41);
            $table->float('USD_sell')->default(4.42);
            $table->float('GBP_buy')->default(5.37);
            $table->float('GBP_sell')->default(5.38);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
