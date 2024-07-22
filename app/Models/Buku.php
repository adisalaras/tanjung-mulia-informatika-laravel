<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[
        'id'
    ];

    public function anggota(){
        return $this->belongsToMany(Anggota::class, 'peminjaman', 'anggota_id', 'buku_id')
        ->wherePivotNull('deleted_at')
        ->withPivot('id');
    }
}
