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
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');

            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('kamar_id')
                ->constrained('kamars')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('no_hp');
            $table->string('password');
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
