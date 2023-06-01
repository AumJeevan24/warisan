<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarisanData extends Model
{
    protected $table = 'warisan_data';

    protected $fillable = ['kategori', 'nama', 'desc', 'date', 'gambar'];
}
