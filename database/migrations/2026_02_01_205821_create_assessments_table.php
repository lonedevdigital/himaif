<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            
            $table->string('nama_kegiatan'); 
            
            // KOLOM BARU: KATEGORI & NILAI
            $table->string('kategori'); // Isinya nanti: 'rapat', 'progja', atau 'panitia'
            $table->integer('nilai');   // Isinya angka: 0 - 100
            
            $table->text('catatan')->nullable(); // Catatan per input
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assessments');
    }
};