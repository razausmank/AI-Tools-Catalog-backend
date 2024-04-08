<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

protected $fillable = [
        'name',
        'short_description',
        'description',
        'pricing_model',
        'url',
        'views',
        'image',
        'is_verified',
        'is_published',
        'created_by',
        'updated_by'
    ] ;
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

    public function platform($platform_name)
    {
        $platform_name = strtolower($platform_name);
        $platform = $this->platforms()->where('name', $platform_name)->first();
        return $platform ?? Null ;
    }
}
