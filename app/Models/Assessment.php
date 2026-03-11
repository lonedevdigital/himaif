<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $guarded = []; // Izinkan simpan semua data (catatan, nilai, dll)

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}