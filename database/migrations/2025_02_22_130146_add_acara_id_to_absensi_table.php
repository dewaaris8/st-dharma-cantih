<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('absensi_anggotas', function (Blueprint $table) {
            $table->foreignId('acara_id')->nullable()->constrained('acaras')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::table('absensi_anggotas', function (Blueprint $table) {
            $table->dropForeign(['acara_id']);
            $table->dropColumn('acara_id');
        });
    }
};