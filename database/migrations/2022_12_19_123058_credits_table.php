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
            $table->float('credit_left');
            $table->float('earnings');
            $table->string('type');
            $table->integer('work_length');
            $table->integer('total_rates');
            $table->integer('rates_left');
            $table->string('day_to_pay');
            $table->string('end_credit');
            $table->string('status');
            $table->float('one_rate');
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
        Schema::dropIfExists('credits');
    }
};
