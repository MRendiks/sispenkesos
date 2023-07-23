<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $fillable = ['foto_ppks', 'foto_luar', 'foto_dalam'];
    protected  $primaryKey = 'id_foto';

    public function ppks(){
        return $this->belongsTo(Ppks::class);
    }
}
