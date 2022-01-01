<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemajuan extends Model
{
    use HasFactory;

    protected $table = "kemajuan";
    protected $primaryKey = "id_kemajuan";

    protected $fillable = [
        'id_santri', 'id_pengurus', 'tanggal', 'status'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'id_santri', 'id_santri');
    }

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'id_pengurus', 'id_pengurus');
    }

    public function detail_kemajuan()
    {
        return $this->hasMany(DetailKemajuan::class, 'id_kemajuan', 'id_kemajuan');
    }
}
