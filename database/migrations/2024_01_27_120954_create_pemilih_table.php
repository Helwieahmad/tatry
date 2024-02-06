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
            $table->integer('id_kabupaten');
            $table->integer('id_kecamatan');
            $table->integer('id_desa');
            $table->integer('id_rt');
            $table->integer('id_rw');
            $table->integer('id_tps');
            $table->integer('id_kordinator');
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
