<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $fillable = ['nama_kecamatan', 'nama_kecamatan', 'alamat_lengkap'];
    protected  $primaryKey = 'id_kacamatan';


    public function ppks(){
        return $this->belongsTo(Ppks::class);
    }
}
