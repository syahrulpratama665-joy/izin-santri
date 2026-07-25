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
        Schema::create('pengajuan_izins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('santri_id')
                ->constrained('santris')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('jenis_izin_id')
                ->constrained('jenis_izins')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('tanggal_keluar');
            $table->date('tanggal_kembali');

            $table->text('keperluan');

            $table->enum('status', [
                'Menunggu',
                'Disetujui',
                'Ditolak'
            ])->default('Menunggu');

            $table->string('catatan')->nullable();
            $table->string('file_pendukung')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_izins');
    }
};
