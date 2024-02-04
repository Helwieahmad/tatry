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
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilih')->unique();
            $table->integer('kabupaten');
            $table->integer('kecamatan');
            $table->integer('desa');
            $table->integer('no_rt');
            $table->integer('no_rw');
            $table->integer('no_tps');
            $table->integer('kordinator');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilih');
    }
};
