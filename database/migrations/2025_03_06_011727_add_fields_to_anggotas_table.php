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
    Schema::table('anggotas', function (Blueprint $table) {
        $table->string('alamat')->nullable();
        $table->string('nama_ibu')->nullable();
        $table->string('nama_ayah')->nullable();
        $table->enum('daerah', ['Kaja Kauh', 'Kaja Kangin', 'Delod'])->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggotas', function (Blueprint $table) {
            //
        });
    }
};
