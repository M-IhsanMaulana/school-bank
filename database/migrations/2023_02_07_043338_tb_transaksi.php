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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekening_id');
            $table->string('kode_transaksi');
            $table->dateTime('tgl_transaksi');
            $table->enum('jenis_transaksi', ['deposit', 'transfer', 'debit']);
            $table->integer('rekening_tujuan')->nullable();
            $table->integer('saldo_transaksi');
            $table->timestamps();

            $table->foreign('rekening_id')->references('id')->on('tb_rekening')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
