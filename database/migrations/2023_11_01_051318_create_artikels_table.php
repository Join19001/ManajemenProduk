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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id('idArtikel');
            $table->string('jenisArtikel');
            $table->string('kategoriArtikel');
            $table->string('namaPenulis');
            $table->string('judulArtikel');
            $table->string('affiliasi');
            $table->string('email');
            $table->string('dokArtikel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
