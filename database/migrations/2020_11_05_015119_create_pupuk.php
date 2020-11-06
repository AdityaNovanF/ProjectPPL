<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePupuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pupuk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 225);
            $table->string('berat', 20);
            $table->text('manfaat');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_pupuk', function (Blueprint $table) {
            //
        });
    }
}
