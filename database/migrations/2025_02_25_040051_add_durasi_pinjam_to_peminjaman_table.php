<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->integer('durasi_pinjam')->after('tanggal_pinjam')->nullable();
        });
    }

    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn('durasi_pinjam');
        });
    }
};
