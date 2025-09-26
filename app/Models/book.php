<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'pengarang',
        'penerbit',
        'kategori'
    ];


    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori', 'kategori');
}
}