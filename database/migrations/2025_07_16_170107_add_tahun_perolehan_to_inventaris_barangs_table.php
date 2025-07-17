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
        $table->string('tahun_perolehan')->nullable()->after('jumlah');
    });
}

public function down()
{
    Schema::table('inventaris_barangs', function (Blueprint $table) {
        $table->dropColumn('tahun_perolehan');
    });
}

};
