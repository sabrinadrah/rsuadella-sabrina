<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $guarded = [];

    protected $fillable = [
        'nama',
        'nik',
        'ttl',
        'ibu',
        'alamat',
        'no_hp',
        'no_bpjs',
        'gender',
        'goldar',
        'agama',
        'status',
        'pendidikan',
        'pekerjaan',
        'penjamin',
    ];
    
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_pasien', 'id');
    }
}
