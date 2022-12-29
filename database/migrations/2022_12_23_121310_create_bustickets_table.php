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
        Schema::create('bustickets', function (Blueprint $table) {
            $table->increments('id_bt');
            $table->integer('id_user');
            $table->string('city');
            $table->string('type');
            $table->float('amount');
            $table->integer('qrcode');
            $table->string('time');
            $table->string('end_time');
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
        Schema::dropIfExists('bustickets');
    }
};
