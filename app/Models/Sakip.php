<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sakip extends Model
{
    use HasFactory;
    protected $table = 'sakip';
    protected $fillable = ['title', 'deskripsi', 'link_download','image'];
}
