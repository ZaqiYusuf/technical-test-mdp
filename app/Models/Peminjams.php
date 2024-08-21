<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjams extends Model
{
    use HasFactory;
    protected $table = 'peminjams';
    protected $fillable = [
        'user_id',
        'buku_id',
        'lending_date',
        'return_date'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'buku_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
