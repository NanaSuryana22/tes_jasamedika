<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;

    protected $table = "kinerjas";

    protected $fillable = [
        'pegawai_id', 'tugas_jabatan_id'
    ];

    public function pegawais() {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }

    public function tugas_jabatans() {
        return $this->belongsTo('App\Models\TugasJabatan', 'tugas_jabatan_id');
    }
}
