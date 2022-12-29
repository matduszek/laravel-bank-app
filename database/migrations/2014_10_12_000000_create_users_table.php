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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('birth_date')->comment('Data urodzenia');
            $table->string('email')->unique();
            $table->string('gender')->comment('K/M');
            $table->string('citizenship')->comment('Obywatelstwo');
            $table->string('icn')->unique()->comment('Numer i seria dowodu');
            $table->string('phone_number')->unique()->comment('Telefon kontaktowy');
            $table->string('city')->comment('Miasto');
            $table->string('domicile')->comment('Adres zameldowania');
            $table->string('postal_code')->comment('Kod pocztowy');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pesel')->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
