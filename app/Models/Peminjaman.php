<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'peminjaman';

    protected $guarded= [
        'id'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    /**
     * Get the buku that owns the Peminjaman.
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
