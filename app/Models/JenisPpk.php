<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPpk extends Model
{
    use HasFactory;

    protected $table = 'jenis_ppks';
    protected $fillable = ['nama_jenis'];
    protected  $primaryKey = 'jenis_ppks_id';

    public function ppks(){
        return $this->belongsTo(Ppks::class);
    }
}
