<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function jenisRuangan()
    {
        return $this->belongsTo(JenisRuangan::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
