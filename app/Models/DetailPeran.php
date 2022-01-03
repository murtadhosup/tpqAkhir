<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeran extends Model
{
    use HasFactory;

    protected $table = "detail_peran";
    protected $primaryKey = "id_detail_peran";
    protected $fillable = ['id_peran','id_pengurus'];
}
