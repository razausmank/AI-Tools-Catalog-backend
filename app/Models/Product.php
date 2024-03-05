<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [] ;

    public const PRICING_MODEL = [
        'Free',
        'Paid',
        'Free Trial',
        'Fremium',
        'Contact for Pricing'
    ];
}
