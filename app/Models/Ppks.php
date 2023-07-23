<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppks extends Model
{
    use HasFactory;

    protected $table = 'ppks';

    protected $fillable = [
        'nama_ppks',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'pendidikan_ditamatkan',
        'jaminan_kesehatan',
        'pekerjaan',
        'keterangan',
        'foto',
        'kecamatan_id',
        'jenis_ppks_id',
        'detail_jenis_id',
    ];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }

    public function jenisPpks()
    {
        return $this->hasMany(JenisPpks::class);
    }

    public function detailJenis()
    {
        return $this->hasMany(DetailJenis::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
