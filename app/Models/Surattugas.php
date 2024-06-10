<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Surattugas extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $table = 'surat_tugas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['pegawai_id', 'keterangan', 'tanggal', 'file_bukti'];



    public function user()
    {
        return $this->belongsTo('App\Models\User', 'pegawai_id');
    }
}
