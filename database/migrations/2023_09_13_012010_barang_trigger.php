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
        CREATE TRIGGER barang_trigger AFTER INSERT ON `barang` FOR EACH ROW
            BEGIN
                INSERT INTO role_user (`role_id`, `user_id`, `created_at`, `updated_at`) 
                VALUES (3, NEW.id, now(), null);
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
