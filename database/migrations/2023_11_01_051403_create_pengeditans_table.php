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
        Schema::create('pengeditans', function (Blueprint $table) {
            $table->id('idPengeditan');
            $table->string('namaUser');
            $table->string('bahasa');
            $table->string('dokFormat');
            $table->string('dokPengeditan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeditans');
    }
};
