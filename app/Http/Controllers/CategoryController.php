<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    public function store( Request $request )
    {
        $validated_fields = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category = Category::create($validated_fields);

        return $category;
    }

    public function update( Request $request, Category $category )
    {
        $validated_fields = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category->update($validated_fields);

        return $category;
    }

    public function delete( Category $category )
    {
        // Category can only be deleted if there is no product associated with it
        try {
            if ( $category->products()->count())
            {
                return "Category is attached to products and hence cannot be deleted" ;
            }

            $category->delete();

        } catch (Exception $e) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return "Category succesfully deleted" ;
    }
}
