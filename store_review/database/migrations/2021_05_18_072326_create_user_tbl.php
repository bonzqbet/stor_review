<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sy_stf', function (Blueprint $table) {
            $table->id('sy_stf_id');
            $table->string('sy_stf_gender')->nullable();
            $table->string('sy_stf_fname')->nullable();
            $table->string('sy_stf_lname')->nullable();
            $table->string('sy_stf_username')->nullable();
            $table->string('sy_stf_password')->nullable();
            $table->string('sy_stf_status')->nullable();
            $table->string('sy_stf_roll')->nullable();
            $table->string('sy_stf_email')->nullable();
            $table->string('sy_stf_order')->nullable();
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
        Schema::dropIfExists('sy_stf');
    }
}
