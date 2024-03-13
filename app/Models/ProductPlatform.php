<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPlatform extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public const PLATFORM = [
        'Facebook',
        'Tiktok',
        'Youtube',
        'Instagram'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
