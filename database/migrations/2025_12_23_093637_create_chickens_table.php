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
        Schema::create('chickens', function (Blueprint $table) {
    $table->id();
    $table->string('kode_kandang');
    $table->string('jenis_ayam');
    $table->integer('jumlah_ekor');
    $table->date('tanggal_masuk');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chickens');
    }
};
