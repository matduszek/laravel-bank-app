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
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id_credit')->comment("Przewalutować możemy jedynie PLN");
            $table->unsignedInteger('id_user');
            $table->float('credit_amount');
            $table->float('earnings');
            $table->string('type');
            $table->integer('work_length');
            $table->integer('total_rates');
            $table->float('one_rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
};
