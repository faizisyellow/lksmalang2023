<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
  protected $fillable = ['id_fakultas', 'nama_jurusan'];

    public function fakultas()
    {
        return $this->belongsTo(fakultas::class,'id_fakultas');
    }

    public $primaryKey= 'id_jurusan';
}
