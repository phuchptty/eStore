<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parentCategory')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $summary = $request->summary;
        $quantity = $request->quantity;
        $price = $request->price;
        $category = $request->category;

        $product = Product::create([
            'title' => $title,
            'user_id' => Auth::user()->id,
            'summary' => $summary,
            'type' => 1,
            'quantity' => $quantity,
            'price' => $price
        ]);

        $product->categories()->attach($category);

        return redirect()->route('admin.product.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::with('parentCategory')->get();

        return view('admin.products.update', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $summary = $request->summary;
        $quantity = $request->quantity;
        $price = $request->price;

        Product::where('id', $id)->update([
            'title' => $title,
            'user_id' => Auth::user()->id,
            'quantity' => $quantity,
            'price' => $price
        ]);

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return back();
    }
}
