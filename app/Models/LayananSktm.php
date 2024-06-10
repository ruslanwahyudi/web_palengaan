<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSktm extends Model
{
    use HasFactory;
    protected $table = 'layanan_sktm';
    protected $guarded = []; 

    public function transaksi_layanan(){
        return $this->belongsTo('App\Models\TransaksiLayanan', 'transaksi_id');
    }
}
