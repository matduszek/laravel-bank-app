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
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id_ins');
            $table->integer('id_user');
            $table->string('type');

            $table->string('brand')->nullable();
            $table->string('cap')->nullable();
            $table->string('value')->nullable();
            $table->string('kilometers')->nullable();
            $table->string('production')->nullable();
            $table->string('rejestracja')->nullable();

            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('earnings')->nullable();
            $table->string('profesion')->nullable();
            $table->string('community_status')->nullable();
            $table->string('sum_ins')->nullable();

            $table->string('building_type')->nullable();
            $table->string('m2')->nullable();
            $table->string('location')->nullable();
            $table->string('year')->nullable();
            $table->string('city')->nullable();
            $table->string('domicile')->nullable();

            $table->float('price');
            $table->string('end_time');
            $table->string('status');
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
        Schema::dropIfExists('insurances');
    }
};
