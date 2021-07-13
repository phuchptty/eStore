<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // session()->forget('cart');
        return view('user.products.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            // first item
            $cart = [
                $id => [
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        // return redirect()->route('user.home.index');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = formatNumber($cart[$request->id]['quantity'] * $cart[$request->id]['price']);

            $data = $this->getCartTotal();

            return response()->json(['msg' => 'Cart updated successfully', 'total' => $data['total'],'quantity' => $data['quantity'], 'subTotal' => $subTotal]);
            // session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $data = $this->getCartTotal();


            return response()->json(['msg' => 'Product removed successfully', 'total' => $data['total'],'quantity' => $data['quantity'],]);

            // session()->flash('success', 'Product removed successfully');
        }
    }

    private function getCartTotal()
    {
        $total = 0;

        $quantity = 0;

        $cart = session()->get('cart');

        foreach ($cart as $id => $product) {
            $total += $product['price'] * $product['quantity'];
            $quantity += $product['quantity'];
        }

        return ['total' => formatNumber($total), 'quantity' => $quantity];
    }
}
