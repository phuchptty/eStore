<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner1 = Product::where('banner_1', 1)->where('active', 1)->first();
        $banner2 = Product::where('banner_2', 1)->where('active', 1)->get();

        $date = \Carbon\Carbon::today()->subDays(7);
        $newProducts = Product::where('active', 1)->where('price', '<>', 0)->where('created_at', '>=', $date)->latest()->limit(20)->get();
        $recentlyViewed = [];

        $products = session()->get('products.recently_viewed');
        if ($products) {
            $recentlyViewed = Product::find($products);
        }

        return view('user.home', compact('banner1', 'banner2', 'newProducts', 'recentlyViewed'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        session()->push('products.recently_viewed', $product->id);

        return view('user.products.details', compact('product'));
    }

    public function showProductByCategory(Request $request, $id)
    {
        $categories = Category::whereNull('parent_id')->where('active', 1)->get();

        $category = Category::with('childrenCategories')->where('id', $id)->first();

        $listCategories = Category::where('parent_id', $parentId = Category::where('id', $id)->value('id'))->pluck('id')->push($parentId)->all();

        $products = Product::whereHas('categories', function ($q) use ($listCategories) {
            $q->whereIn('id', $listCategories);
        })->paginate(20);

        $recentlyViewed = [];

        $productsViewed = session()->get('products.recently_viewed');
        if ($productsViewed) {
            $recentlyViewed = Product::find($productsViewed);
        }

        return view('user.products.index', compact('categories', 'products', 'recentlyViewed', 'category'));
    }
}
