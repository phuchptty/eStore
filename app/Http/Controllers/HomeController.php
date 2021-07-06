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

        $newProducts = Product::where('active', 1)->latest()->limit(20)->get();
        $recentlyViewed = [];

        $products = session()->get('products.recently_viewed');
        if($products) {
            $recentlyViewed = Product::find($products);
        }

        return view('user.home', compact('banner1', 'banner2', 'newProducts', 'recentlyViewed'));
    }

    public function showProduct($id) {
        $product = Product::findOrFail($id);
        session()->push('products.recently_viewed', $product->id);

        return view('user.products.details', compact('product'));
    }
}
