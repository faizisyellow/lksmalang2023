<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Perguruantinggi extends Model
{
    use HasFactory;
    protected $fillable=['nama_perguruan_tinggi', 'alamat', 'website', 'email', 'akreditasi', 'biaya','kategori'];


    public function fakultas(){
        return $this->hasMany(fakultas::class,'perguruantinggi_id');

    }
        // public $primaryKey= 'id_perguruantinggi';
}
