<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'title',
        'author',
        'cover',
        'publisher',
        'category_buku',
        'publication_year',
        'status'
    ];

    public function peminjam()
    {
        return $this->hasMany(Peminjams::class, 'buku_id', 'buku_id');
    }

    public function koleksi()
    {
        return $this->hasMany(Koleksi::class, 'buku_id', 'buku_id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'buku_id', 'buku_id');
    }

}
