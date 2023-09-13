<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $triggerName = 'trgBarangStok';
    public function up(): void
    {

        // DB: unprepared('DROP TRIGGER IF EXIST ' . $this->triggerName);
        DB::unprepared('
        CREATE TRIGGER trigger_barang_stok AFTER INSERT ON barang FOR EACH ROW
            BEGIN
                INSERT INTO stok (id_barang, id_cabang, harga, stok)
                SELECT new.id_barang, id_cabang, 0,0 FROM cabang;
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
