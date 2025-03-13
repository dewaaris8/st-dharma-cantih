<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->string('nama_peminjam')->after('durasi_pinjam');
        $table->string('nomor_peminjam')->after('nama_peminjam');
    });
}

public function down()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->dropColumn(['nama_peminjam', 'nomor_peminjam']);
    });
}

};
