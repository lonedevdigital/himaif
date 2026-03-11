<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // GANTI '$fillable' DENGAN INI BIAR 'skor_awal' BISA MASUK:
    protected $guarded = []; 

    // Relasi: Anggota punya BANYAK Riwayat Nilai
    // Kita tambahkan 'orderBy' supaya history muncul dari yang TERBARU
    public function assessments()
    {
        return $this->hasMany(Assessment::class)->orderBy('created_at', 'desc');
    }
}