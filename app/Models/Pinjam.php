<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_pinjam',
        'nama_peminjam',
        'judul_buku',
        'tanggal_kembali',
        'petugas'
    ];
}