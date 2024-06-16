<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisai extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['name_organisai'];
    // protected $hidden = [];
    // protected $dates = [];
}
