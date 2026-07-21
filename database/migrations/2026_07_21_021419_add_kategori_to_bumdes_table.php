<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bumdes', function (Blueprint $table) {
            $table->string('kategori')->default('Unit Usaha')->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('bumdes', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};