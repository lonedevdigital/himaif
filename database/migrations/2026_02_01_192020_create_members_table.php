<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('divisi');
        $table->integer('angkatan');

        // SKOR AWAL (Modal Pertama, misal: 100) - TIDAK BERUBAH
        $table->float('skor_awal')->default(0); 

        // SKOR REAL-TIME (Rata-rata Berjalan) - BERUBAH TERUS
        $table->float('skor')->default(0); 

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};