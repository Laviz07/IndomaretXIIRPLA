<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kasir', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_kasir', true)->nullable(false);
            $table->integer('id_cabang', false)->nullable(false)->unique('kasirIdCabang');
            $table->string('nama_lengkap', 100)->nullable(false);
            $table->text('alamat')->nullable(false);
            $table->date('tanggal_lahir')->nullable(false)->default('1990-01-01');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable(false);
            $table->integer('id_akun', false)->nullable(false)->unique('idAkun');

            //foreign key id cabang
            $table->foreign('id_cabang')
                ->references('id_cabang')->on('cabang')
                ->onDelete('cascade')->onUpdate('cascade');

            //foreign key id akun
            $table->foreign('id_akun')
                ->references('id_akun')->on('tbl_akun')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
