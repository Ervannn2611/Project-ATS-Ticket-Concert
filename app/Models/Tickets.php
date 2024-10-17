<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Tickets extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi massal (mass assignable).
     *
     * @var array
     */

     protected $table = 'tickets';
    protected $fillable = [
        'nama_konser',
        'lokasi',
        'tanggal',
        'harga',
        'jumlah_tiket',
        'tiket_terjual',
        'deskripsi',
        'image'
    ];

    /**
     * Relasi ke tabel orders.
     *
     * Setiap tiket bisa dimasukkan ke dalam banyak pesanan.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
