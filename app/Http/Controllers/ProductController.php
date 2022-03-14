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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('active', 1)->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $categories = Category::with('parentCategory')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $summary = $request->summary;
        $image = $request->image;
        $price = $request->price;
        $quantity = $request->quantity != 0 ? $request->quantity : 200;
        $discount = $request->discount;
        $banner1 = $request->banner1 == 'on' ? 1 : 0;
        $banner2 = $request->banner2 == 'on' ? 1 : 0;
        $active = $request->active == 'on' ? 1 : 0;
        $category = $request->category;

//        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $fileName = $image;

        $product = Product::create([
            'user_id' => Auth::user()->id,
            'title' => $title,
            'summary' => $summary,
            'image' => $fileName,
            'price' => $price,
            'quantity' => $quantity,
            'discount' => $discount,
            'banner_1' => $banner1,
            'banner_2' => $banner2,
            'active' => $active
        ]);

        $product->categories()->attach($category);

//        $request->image->storeAs('uploads', $fileName, 'public');

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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $summary = $request->summary;
        $image = $request->image;
        $price = $request->price;
        $quantity = $request->quantity;
        $discount = $request->discount;
        $banner1 = $request->banner1 == 'on' ? 1 : 0;
        $banner2 = $request->banner2 == 'on' ? 1 : 0;
        $active = $request->active == 'on' ? 1 : 0;
        $category = $request->category;

        $productOld = Product::find($id);
        $productOld->categories()->updateExistingPivot($productOld->categories[0]->id, ['category_id' => $category]);

        Product::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'title' => $title,
            'summary' => $summary,
            'price' => $price,
            'quantity' => $quantity,
            'discount' => $discount,
            'banner_1' => $banner1,
            'banner_2' => $banner2,
            'active' => $active
        ]);

        if ($request->image) {
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            Product::where('id', $id)->update([
                'image' => $fileName,
            ]);
            $request->image->storeAs('uploads', $fileName, 'public');
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return back();
    }
}
