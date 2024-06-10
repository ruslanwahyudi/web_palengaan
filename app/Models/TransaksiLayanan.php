<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiLayanan extends Model
{
    use HasFactory;
    protected $table = "transaksi_layanan";

    public function sktm(){
        return $this->hasMany('App\Models\LayananSktm');
    }

    public function rekom_nikah(){
        
    }
}
