<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'kode',
        'nama',
        'harga_beli',
        'harga_jual',
        'stok',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
