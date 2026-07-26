<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('galeris');
    }

    public function down(): void
    {
        // sengaja dikosongkan, karena struktur galeri sudah tidak dipakai lagi
    }
};