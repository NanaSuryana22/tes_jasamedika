<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasJabatan extends Model
{
    use HasFactory;

    protected $table = "tugas_jabatans";

    protected $fillable = [
        'nama_tugas', 'bobot_penilaian'
    ];

    public function kinerjas() {
        return $this->hasMany('App\Models\Kinerja', 'tugas_jabatan_id');
    }
}
