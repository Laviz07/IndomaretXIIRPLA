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
        //
        DB::unprepared('
        CREATE TRIGGER trigger_cabang_stok AFTER INSERT ON cabang FOR EACH ROW
        BEGIN
            INSERT INTO stok (id_barang, id_cabang,harga,stok)
            SELECT id_barang, new.id_cabang, 0, 0 FROM barang;
        END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
