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
        Schema::create('tb_rekening', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('nik');
            $table->string('nomor_induk');
            $table->text('alamat');
            $table->unsignedBigInteger('kelas_id');
            $table->integer('no_rekening');
            $table->integer('pin');
            $table->integer('total_saldo');
            $table->enum('status_rek', ['disable', 'enable', 'blocked']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('null');
            $table->foreign('kelas_id')->references('id')->on('tb_kelas')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_rekening');
    }
};
