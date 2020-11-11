<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_po', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pupuk')->unsigned();
            $table->string('nama', 225);
            $table->string('kode', 40);
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('pupuk')->references('id')->on('m_pupuk')->onDelete('restrict');
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
        Schema::table('m_po', function (Blueprint $table) {
            //
        });
    }
}
