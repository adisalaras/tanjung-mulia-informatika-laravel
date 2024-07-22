<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function buku(){
        return $this->belongsToMany(Buku::class, 'peminjaman', 'buku_id', 'anggota_id')
        ->wherePivotNull('deleted_at')
        ->withPivot('id');
    }
}
