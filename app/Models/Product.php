<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'is_available',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getWhatsAppUrlAttribute(): string
    {
        $phone = $this->store->formatted_phone;
        $message = rawurlencode(
            "Halo {$this->store->name},\n\n" .
            "Saya tertarik dan ingin memesan via LocalKita:\n" .
            "📦 Produk: {$this->name}\n" .
            "💰 Harga: {$this->formatted_price}\n\n" .
            "Apakah produk ini masih ready/tersedia? Terima kasih!"
        );
        return "https://wa.me/{$phone}?text={$message}";
    }
}
