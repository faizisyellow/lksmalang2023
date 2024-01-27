<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fakultas extends Model
{
    use HasFactory;
    protected $fillable=['nama_fakultas','id_perguruantinggi'];

        public function jurusan(){
            return $this->hasMany(jurusan::class,'id_jurusan');
            
        }
        public function perguruantinggi(){
            return $this->belongsTo(perguruantinggi::class, 'id_perguruantinggi');
        }
        
    public $primaryKey= 'id_fakultas';
}
