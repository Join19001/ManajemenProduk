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
        Schema::create('hakis', function (Blueprint $table) {
            $table->id('idHaki');
            $table->string('jenisProduk');
            $table->string('layananHaki');
            $table->string('judulProduk');
            $table->date('tglPembuatan');
            $table->string('ktp');
            $table->string('dokProduk');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hakis');
    }
};
