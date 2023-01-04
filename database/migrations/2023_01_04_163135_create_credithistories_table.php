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
        Schema::create('credit_histories', function (Blueprint $table) {
            $table->increments('id_credit');
            $table->integer('id_user');
            $table->integer('id_c');
            $table->float('credit_amount');
            $table->integer('total_rates');
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
        Schema::dropIfExists('credit_histories');
    }
};
