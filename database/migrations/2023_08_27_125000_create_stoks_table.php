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
        Schema::create('stok', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_stok', true)->nullable(false);
            $table->integer('id_barang', false)->nullable(false)->index('idBarangStok');
            $table->integer('id_cabang', false)->index('idCabangStok')->nullable(false);
            $table->float('harga', 10, 2)->nullable(false);
            $table->timestamps();

            //foreign key barang
            $table->foreign('id_barang')
                ->references('id_barang')->on('barang')
                ->onDelete('cascade')->onUpdate('cascade');

            //foreign key cabang
            $table->foreign('id_cabang')
                ->references('id_cabang')->on('cabang')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
