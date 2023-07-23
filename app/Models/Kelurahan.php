<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $fillable = ['nama_kelurahan', 'desa_kelurahan'];
    protected  $primaryKey = 'id_kelurahan';


    public function ppks(){
        return $this->belongsTo(Ppks::class);
    }
}
