<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama', 'bidang_keahlian', 'kuota', 'jenjang', 'prodi_id'];
    //
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class);
    }
    public function sisaKuota()
    {
        return $this->kuota - $this->pengajuans()
            ->where('status', 'disetujui')
            ->count();
    }

    public function isFull()
    {
        return $this->pengajuans()
            ->where('status', 'disetujui')
            ->count() >= $this->kuota;
    }
}
