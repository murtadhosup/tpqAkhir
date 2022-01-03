<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    use HasFactory;

    protected $table = "bab";
    protected $primaryKey = "id_bab";
    public $incrementing = false;
    protected $fillable = [
        'id_buku', 'bab' , 'judul', 'keterangan'
    ];
}
