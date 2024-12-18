<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;


    protected $fillable = ['nama', 'deskripsi', 'jumlah_stok', 'harga', 'diskon', 'kategori_id', 'ukuran'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penjual()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(ImageProduk::class);
    }
    public function pemesanans()
    {
        return $this->belongsToMany(User::class, 'pemesanan', 'product_id', 'user_id')
            ->withPivot('total_item_pesanan', 'total_biaya', 'status_pesan', 'shipping_address', 'payment_method', 'tanggal_pemesanan')
            ->withTimestamps();
    }
    public function review()
    {
        return $this->belongsToMany(User::class, 'review', 'product_id', 'user_id')
            ->withPivot('review', 'rating')
            ->withTimestamps();
    }
    public function kategori()
    {
        return $this->belongsTo(Category::class);
    }
}
