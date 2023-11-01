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
        Schema::create('seminars', function (Blueprint $table) {
            $table->id('idSeminar');
            $table->string('jenisSeminar');
            $table->string('namaSeminar');
            $table->string('role');
            $table->string('namaPendaftar');
            $table->string('nomorHP');
            $table->string('email');
            $table->string('buktiBayar');
            $table->string('dokAbstrak')->nullable();
            $table->string('dokPemakalah')->nullable();
            $table->string('pdfPemakalah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminars');
    }
};
