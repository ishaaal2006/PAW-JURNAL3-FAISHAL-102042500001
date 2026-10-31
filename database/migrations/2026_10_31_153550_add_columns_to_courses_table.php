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
    Schema::table('courses', function (Blueprint $table) {
        $table->string('kode_mk')->unique();
        $table->string('nama_mk');
        $table->text('deskripsi')->nullable();
        $table->unsignedTinyInteger('sks');
        $table->foreignId('dosen_id')
              ->constrained('users')
              ->cascadeOnDelete();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::table('courses', function (Blueprint $table) {
        $table->dropForeign(['dosen_id']);
        $table->dropColumn([
            'kode_mk',
            'nama_mk',
            'deskripsi',
            'sks',
            'dosen_id',
        ]);
    });
}
};