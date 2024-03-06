<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function store( Request $request )
    {
        $validated_fields = $request->validate([
            'name' => ['string', 'required'],
            'short_description' => ['string', 'required'],
            'description' => ['string', 'required'],
            'pricing_model' => ['string', Rule::in( Product::PRICING_MODEL )],
            'url' => ['string', 'required'],
        ]);

        $product = Product::create(
            $validated_fields
        );

        return $product;
    }

    public function update( Request $request , Product $product)
    {
        $validated_fields = $request->validate([
            'name' => ['string', 'required'],
            'short_description' => ['string', 'required'],
            'description' => ['string', 'required'],
            'pricing_model' => ['string', Rule::in( Product::PRICING_MODEL )],
            'url' => ['string', 'required'],
        ]);

        $product->update($validated_fields);

        return $product;
    }


    public function publish( Request $request , Product $product)
    {
        if ( $product->is_published )
        {
            return 'The Product is already published';
        }

        $product->update([
            'is_published' => true
        ]);

        return $product;
    }

    public function unpublish( Request $request , Product $product)
    {
        if ( !$product->is_published )
        {
            return 'The Product is already Unpublished';
        }

        $product->update([
            'is_published' => false
        ]);

        return $product;
    }
}
