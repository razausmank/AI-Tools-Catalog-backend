<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [] ;
    protected $attributes = [
        'views' => 0,
        'is_verified' => false,
        'is_published' => false
     ];

    public const PRICING_MODEL = [
        'Free',
        'Paid',
        'Free Trial',
        'Fremium',
        'Contact for Pricing'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')->withTimestamps();
    }

    public function platforms()
    {
        return $this->hasMany(ProductPlatform::class,  'product_id', 'id');
    }
}
