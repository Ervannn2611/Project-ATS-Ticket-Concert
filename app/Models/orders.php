<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tiket_konser_id',
        'jumlah_tiket',
        'total_harga',
        'status',
    ];

    /**
     * Atribut yang di-cast secara otomatis.
     *
     * @var array
     */
    protected $casts = [
        'total_harga' => 'decimal:2',
    ];

    /**
     * Relasi ke tabel `users`.
     * 
     * Setiap pesanan (order) dimiliki oleh satu pengguna (user).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel `tickets`.
     * 
     * Setiap pesanan berhubungan dengan satu tiket konser.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'tiket_konser_id');
    }
}
