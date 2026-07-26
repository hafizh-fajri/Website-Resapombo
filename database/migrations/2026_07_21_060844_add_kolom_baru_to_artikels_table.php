<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->text('sinopsis')->nullable()->after('judul');
            $table->string('penulis')->nullable()->after('sinopsis');
            $table->string('link_eksternal')->nullable()->after('isi');
            $table->foreignId('kategori_berita_id')->nullable()->after('link_eksternal')->constrained('kategori_berita')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->dropForeign(['kategori_berita_id']);
            $table->dropColumn(['sinopsis', 'penulis', 'link_eksternal', 'kategori_berita_id']);
        });
    }
};