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

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store( Request $request )
    {
        $validated_fields = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category = Category::create($validated_fields);

        return redirect(route('category.index'))->with('success', 'Product Category successfuly created');
    }


    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update( Request $request, Category $category )
    {
        $validated_fields = $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category->update($validated_fields);

        return redirect(route('category.index'))->with('success', 'Product Category successfuly updated');
    }

    public function destroy( Category $category )
    {
        // Category can only be deleted if there is no product associated with it
        try {
            if ( $category->products()->count())
            {
                return redirect(route('category.index'))->with('failure', "Category is attached to products and hence cannot be deleted");
            }

            $category->delete();

        } catch (Exception $e) {
            return [ "Something went wrong" , $e->getMessage()];
        }

        return redirect(route('category.index'))->with('success', 'Product Category successfuly deleted');

    }
}
