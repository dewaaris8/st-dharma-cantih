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
        Schema::table('absensi_anggotas', function (Blueprint $table) {
            $table->foreignId('anggota_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Tidak Hadir', 'Izin', 'Sakit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi_anggotas', function (Blueprint $table) {
            $table->dropForeign(['anggota_id']);
            $table->dropColumn(['anggota_id', 'tanggal', 'status']);
        });
    }
};
