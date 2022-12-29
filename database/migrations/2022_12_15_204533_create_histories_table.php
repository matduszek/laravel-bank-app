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
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id_t');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_account');
            $table->unsignedInteger('id_user_to');
            $table->unsignedInteger('id_account_to');
            $table->string('account_number');
            $table->string('account_number_to');
            $table->string('title');
            $table->float('total_amount');
            $table->float('old_amount');
            $table->string('currency');
            $table->float('currency_exchange');
            $table->float('new_amount');
            $table->string('currency_to');
            $table->string('type')->comment('W - wychodzacy / P - przychodzący');
            $table->string('blik')->comment('y - yes / n - no');
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
        Schema::dropIfExists('histories');
    }
};
