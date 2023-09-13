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
        Schema::create('cabang', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_cabang', true)->nullable(false);
            $table->integer('id_perusahaan', false)->index('idPerusahaan');
            $table->text('alamat')->nullable(false);
            $table->string('kode_cabang', 200)->nullable(false);
            $table->string('nama_cabang', 100)->nullable(false);
            $table->string('penanggung_jawab', 255)->nullable(false);

            // foreign key id perusahaan
            $table->foreign('id_perusahaan')
                ->references('id_perusahaan')->on('perusahaan')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabang');
    }
};
