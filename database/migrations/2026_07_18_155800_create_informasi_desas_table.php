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
        Schema::create('informasi_desas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jumlah_penduduk')->default(0);
            $table->decimal('luas_wilayah', 8, 2)->default(0);
            $table->unsignedInteger('jumlah_dusun')->default(0);
            $table->unsignedInteger('jumlah_rtrw')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_desas');
    }
};
