<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPlatform;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use PDOException;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function filter_function(Request $request) // not being used atm
    {
        $products = Product::query();

        try{

            foreach ($request->query() as $param_key => $param_value) {
                $products = $products->where($param_key, $param_value);
            }

            $products = $products->get();
        } catch( PDOException $e)
        {
            return [ "The specified column does not exist in the table." , $e->getMessage()];
        } catch( Exception $e)
        {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return $products;
    }

    public function create()
    {
        $pricing_models = Product::PRICING_MODEL ;
        $categories = Category::all();
        $socialMediaPlatforms = ProductPlatform::PLATFORM;
        return view('products.create', compact('pricing_models', 'categories', 'socialMediaPlatforms'));
    }

    public function store( ProductRequest $request )
    {

        $validated_fields = $request->all() ;

        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/products');
            $validated_fields['image'] = $image_address;
        }

        DB::beginTransaction();

        try {
            $product = Product::create(
                $validated_fields
            );

            $product->categories()->attach($request->categories_id);

            foreach ( $request->platform as $platform_key => $platform_url)
            {
                if ($platform_url)
                {
                    ProductPlatform::create([
                        'name' => ucfirst(str_replace('_url', '', $platform_key)),
                        'url' => $platform_url,
                        'product_id' => $product->id
                    ]);
                }
            }

            DB::commit();

            return redirect(route('product.index'))->with('success', 'Product successfuly created');

        } catch (Exception $e) {

            DB::rollBack();

            return $e->getMessage();
            return response(view('error', [
                'response_code' => 'Uh Oh',
                'response_text' => 'ERROR',
                'response_message' => 'Something went wrong'
            ]), 401);

        }
    }

    public function edit(Product $product)
    {
        $pricing_models = Product::PRICING_MODEL ;
        $categories = Category::all();
        $socialMediaPlatforms = ProductPlatform::PLATFORM;

        return view('products.edit', compact('product', 'pricing_models', 'categories', 'socialMediaPlatforms'));
    }

    public function update( ProductRequest $request , Product $product)
    {
        $validated_fields = $request->all() ;

        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/products');
            $validated_fields['image'] = $image_address;
        }

        $product->update($validated_fields);

        $product->categories()->detach();

        $product->categories()->attach($request->categories_id);

        foreach ( $request->platform as $platform_key => $platform_url)
        {
                ProductPlatform::updateOrCreate([
                    'product_id' => $product->id,
                    'name' => ucfirst(str_replace('_url', '', $platform_key)),],
                [
                    'url' => $platform_url,
                ]);
        }

        return redirect(route('product.index'))->with('success', 'Product successfuly updated');
    }


    public function publish( Request $request , Product $product)
    {
        if ( $product->is_published )
        {
            return redirect(route('product.index'))->with('failure', 'The Product is already published');
        }

        $product->update([
            'is_published' => true
        ]);

        return redirect(route('product.index'))->with('success', 'Product successfuly published');
    }

    public function unpublish( Request $request , Product $product)
    {
        if ( !$product->is_published )
        {
            return redirect(route('product.index'))->with('failure', 'The Product is already Unpublished');
        }

        $product->update([
            'is_published' => false
        ]);

        return redirect(route('product.index'))->with('success', 'Product successfuly unpublished');

    }


    public function destroy(Product $product)
    {
        try {
            $product->categories()->detach();
            $product->delete();
        } catch (Exception $e) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return redirect(route('product.index'))->with('success', 'Product successfuly deleted');
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
