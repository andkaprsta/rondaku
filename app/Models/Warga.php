<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp'
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
