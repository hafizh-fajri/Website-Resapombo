<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('informasi_desas', function (Blueprint $table) {
            $table->dropColumn('jumlah_rtrw');
            $table->unsignedInteger('jumlah_rt')->default(0)->after('jumlah_dusun');
            $table->unsignedInteger('jumlah_rw')->default(0)->after('jumlah_rt');
        });
    }

    public function down(): void
    {
        Schema::table('informasi_desas', function (Blueprint $table) {
            $table->dropColumn(['jumlah_rt', 'jumlah_rw']);
            $table->unsignedInteger('jumlah_rtrw')->default(0);
        });
    }
};