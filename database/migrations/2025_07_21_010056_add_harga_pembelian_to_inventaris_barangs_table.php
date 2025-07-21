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
    Schema::table('inventaris_barangs', function (Blueprint $table) {
        $table->decimal('harga_pembelian', 15, 2)->after('tahun_perolehan')->nullable();
    });
}

public function down()
{
    Schema::table('inventaris_barangs', function (Blueprint $table) {
        $table->dropColumn('harga_pembelian');
    });
}

};
