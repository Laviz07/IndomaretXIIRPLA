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
        Schema::create('transaksi', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_transaksi', true)->nullable(false);
            $table->integer('id_kasir', false)->index('idKasir');
            $table->date('tanggal_transaksi')->nullable(false);
            $table->integer('total', false, true)->nullable(false);
            $table->timestamps();

            //foreign key kasir
            $table->foreign('id_kasir')
                ->references('id_kasir')->on('kasir')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
