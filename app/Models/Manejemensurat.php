<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Manejemensurat extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $table = 'manajemensurat';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['no_surat', 'perihal', 'pengirim', 'tanggal_surat', 'jenis_surat', 'lampiran', 'disposisi_ke','status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'disposisi_ke');
    }
}
