<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'category_name',
    ];


    public  function buku()
    {
        $this->belongsTo(Buku::class, 'buku_id', 'buku_id');
    }
}
