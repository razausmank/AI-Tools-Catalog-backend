<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPlatform;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductPlatformController extends Controller
{
    public function platformNames()
    {
        return ProductPlatform::PLATFORM ;
    }

    public function store(Request $request, Product $product)
    {
        $validated_attributes = $request->validate([
            'name' => ['string', 'required', Rule::in( ProductPlatform::PLATFORM )],
            'url' => ['string'],
            'icon' => ['string']
        ]);

        // check if a platform exists for the same name and product
        $platform = $product->platforms->where('name', $request->name)->first();
        if ($platform)
        {
            return ["a platform already exists for this product" , $platform];
        }

        $productPlatform = ProductPlatform::create(
            $validated_attributes +
            ['product_id' => $product->id ]
        );

        return $productPlatform;
    }

    public function update(Request $request, Product $product, ProductPlatform $platform)
    {
        $validated_attributes = $request->validate([
            'url' => ['string'],
            'icon' => ['string']
        ]);

        $platform->update(
            $validated_attributes
        );

        return $platform;
    }

    public function delete(Product $product, ProductPlatform $platform)
    {
        try {
            $platform->delete();
        } catch (Exception $e) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return "Product succesfully deleted" ;
    }
}
