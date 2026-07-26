<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('perangkats', function (Blueprint $table) {
            $table->text('kata_sambutan')->nullable()->after('no_wa');
        });
    }

    public function down(): void
    {
        Schema::table('perangkats', function (Blueprint $table) {
            $table->dropColumn('kata_sambutan');
        });
    }
};