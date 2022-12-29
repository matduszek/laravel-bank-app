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
        Schema::create('roadtickets', function (Blueprint $table) {
            $table->increments('id_rt');
            $table->integer('id_user');
            $table->string('rej');
            $table->string('road');
            $table->float('amount');
            $table->string('full_road');
            $table->integer('qrcode');
            $table->string('long');
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
        Schema::dropIfExists('roadtickets');
    }
};
