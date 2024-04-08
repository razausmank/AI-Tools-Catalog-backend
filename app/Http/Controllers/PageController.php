<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        $pages = Page::all();
        // gets all the routes and filters out only the index and create routes
        $routes = collect(Route::getRoutes())->map(function ($route) {

            // Remove any routes that is not GET or has the following included in their names
            if (!in_array("GET", $route->methods) || (preg_match('(.edit|.show|.update|.destroy|.store|ignition)', $route->getName()) === 1)) {
                return false;
            }
            return $route->getName();
        })->filter(function ($route) {
            return $route;
        });
        return view('pages.create', compact('pages', 'routes'));
    }


    public function store(PageRequest $request)
    {

        $validated = $request->validated();

        Page::create($validated);

        return redirect(route('page.index'))->with('success', 'Page Created Succesfully');
    }

    public function edit(Page $page)
    {
        $pages = Page::all()->except($page->id);

        $routes = collect(Route::getRoutes())->map(function ($route) {
            if (!in_array("GET", $route->methods) || preg_match('(edit|show|update|destroy|store|ignition)', $route->getName()) === 1) {
                return false;
            }
            return $route->getName();
        })->filter(function ($route) {
            return $route;
        });

        return view('pages.edit', compact('pages', 'page', 'routes'));
    }

    public function update(Page $page, PageRequest $request)
    {

        $validated = $request->validated();
        $page->update($validated);

        return redirect(route('page.index'))->with('success', 'Page Updated Succesfully');
    }

    public function destroy(Page $page)
    {
        try {
            $page->destroy($page->id);
        } catch (Exception $exception) {
            return redirect(route('page.index'))->with('failure', 'Page Cannot be deleted, the page has sub pages');
        }

        return redirect(route('page.index'))->with('success', 'Page Deleted Succesfully');
    }

    public function pageHierarchy()
    {
        $pages = Page::whereNull('parent_page_id')->with('sub_pages')->orderBy('sort_order', 'ASC')->get();

        $pages = json_encode($pages->toArray());

        return view('pages.page-hierarchy', compact('pages'));
    }

    public function updatePageHierarchy()
    {
        $response = json_decode(request('data'));

        foreach ($response as $page_sort_order => $page) {
            $page_update = Page::find($page->id);
            if ($page->parent != '#') {
                $page_update->update([
                    'sort_order' => $page_sort_order,
                    'parent_page_id' => $page->parent
                ]);
            } else {
                $page_update->update([
                    'sort_order' => $page_sort_order,
                    'parent_page_id' => null
                ]);
            }
        }
        return $response;
    }
}
