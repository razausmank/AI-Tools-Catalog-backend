<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Product;
use Exception;
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


    public function delete(Product $product)
    {
        try {
            $product->delete();
        } catch (Exception $e) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return "Product succesfull deleted" ;
    }

    public function bookmarkProduct( Product $product)
    {
        $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('product_id', $product->id)->count();

        if ( $bookmark  )
        {
            return "Bookmark already exists";
        }

        $newBookmark = Bookmark::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id
        ]);

        return $newBookmark;
    }

    public function removeBookmarkOfProduct( Product $product )
    {
        $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();

        if ( !$bookmark )
        {
            return "Error! No Bookmark Found";
        }

        try {
            $bookmark->delete();
        } catch ( Exception $e ) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return "Bookmark succesfully deleted" ;
    }
}
