<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_products';

    protected $fillable = [
        'seller_id',
        'title',
        'description',
        'image',
        'price',
        'category',
        'condition',
        'availability',
        'additional_information',
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    
    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'like', '%' . $keyword . '%')
                     ->orWhere('description', 'like', '%' . $keyword . '%');
    }

    public function scopeLatestProducts($query, $limit = 10)
    {
        return $query->latest()->take($limit);
    }
}
