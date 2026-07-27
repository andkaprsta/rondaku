<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'petugas_id',
        'tanggal',
        'qr_token',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
