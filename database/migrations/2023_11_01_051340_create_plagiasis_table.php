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
        Schema::create('plagiasis', function (Blueprint $table) {
            $table->id('idPlagiasi');
            $table->string('namaPenulis');
            $table->string('judulArtikel');
            $table->string('Affiliasi');
            $table->string('email');
            $table->string('dokPlagiasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plagiasis');
    }
};
