<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // --- ACCESSOR ---
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'stok',
        'harga',
        'tahun_terbit'
    ];
    // Accessor status_stok_badge: $buku->status_stok_badgephp
    public function getStatusStokBadgeAttribute(): string
    {
        $stok = $this->stok;

        if ($stok == 0) {
            return '<span class="badge bg-danger">Habis</span>';
        } elseif ($stok >= 1 && $stok <= 5) {
            return '<span class="badge bg-warning text-dark">Menipis</span>';
        } elseif ($stok >= 6 && $stok <= 15) {
            return '<span class="badge bg-info text-dark">Sedang</span>';
        } else {
            return '<span class="badge bg-success">Aman</span>';
        }
    }

    // Accessor tahun_label: $buku->tahun_label
    public function getTahunLabelAttribute(): string
    {
        return $this->tahun_terbit >= 2024 ? 'Buku Baru' : 'Buku Lama';
    }

    // --- QUERY SCOPES ---

    // Scope stokMenipis()
    public function scopeStokMenipis($query)
    {
        return $query->where('stok', '<', 5);
    }

    // Scope hargaRange($min, $max)
    public function scopeHargaRange($query, $min, $max)
    {
        return $query->whereBetween('harga', [$min, $max]);
    }

    // Scope terbaru()
    public function scopeTerbaru($query)
    {
        return $query->where('tahun_terbit', '>=', 2024);
    }
}
