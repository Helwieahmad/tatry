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
        Schema::create('cordinators', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kordinator');
            $table->string('username');
            $table->string('password');
            $table->integer('nama_desa');
            $table->string('no_tlpn');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cordinators');
    }
};
