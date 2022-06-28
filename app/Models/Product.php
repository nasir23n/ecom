<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'image',
        'is_active',
        'featured',
        'category_id',
        'brand_id',
        'unit_id',
        'created_by',
    ];
    
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
}
