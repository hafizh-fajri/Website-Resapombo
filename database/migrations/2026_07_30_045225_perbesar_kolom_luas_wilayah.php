<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE informasi_desas MODIFY luas_wilayah DECIMAL(15,2)');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE informasi_desas MODIFY luas_wilayah DECIMAL(8,2)');
    }
};