<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('active', 1)->with('parentCategory')->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $categories = Category::where('active', 1)->with('parentCategory')->get();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $parent = $request->parent;
        $title = $request->title;
        $active = $request->active == 'on' ? 1 : 0;

        Category::create([
            'parent_id' => $parent,
            'title' => $title,
            'active' => $active
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        return view('admin.categories.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::with('parentCategory')
            ->where('id', '<>', $id)
            ->whereHas('parentCategory', function ($q) use ($id) {
                $q->where('id', '<>', $id);
            })
            ->orWhere('id', '<>', $id)
            ->whereNull('parent_id')
            ->get();

        return view('admin.categories.update', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        $parent = $request->parent;
        $title = $request->title;
        $active = $request->active == 'on' ? 1 : 0;

        Category::where('id', $id)->update([
            'parent_id' => $parent,
            'title' => $title,
            'active' => $active
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return back();
    }
}
