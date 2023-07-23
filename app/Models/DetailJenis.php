<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetailJenis extends Model
{
    use HasFactory;
    protected $table = 'detail_jenis';
    protected $fillable = ['nama_detail_jenis'];
    protected  $primaryKey = 'id_detail_ppks';

    public function ppks(){
        return $this->belongsTo(Ppks::class);
    }
}
