<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perguruantinggi extends Model
{
    use HasFactory;
    protected $fillable=['nama perguruan tinggi', 'alamat', 'website', 'email', 'akreditasi', 'biaya', 'created_at', 'updated_at'];
}
