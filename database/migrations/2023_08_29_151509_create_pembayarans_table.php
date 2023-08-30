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
        Schema::create('pembayaran', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('id_pembayaran', true)->nullable(false);
            $table->integer('id_transaksi', false)->unique('UniqIdTransaksi')->nullable(false);
            $table->integer('jumlah_bayar', false)->nullable(false);
            $table->integer('kembalian', false)->nullable(false);
            $table->timestamps();

            //foreign key transaksi
            $table->foreign('id_transaksi')
                ->references('id_transaksi')->on('transaksi')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
