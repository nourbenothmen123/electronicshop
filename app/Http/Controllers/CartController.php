<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variation;

class CartController extends Controller
{
    public function addToCart(Request $request)

{
    $cart = session()->get('cart', []);

    $variation_id = $request->input('variation_id');
    $name = $request->input('name');
    $price = $request->input('price');
    $image = $request->input('image');
    $attributes = $request->input('attributes');

    if(isset($cart[$variation_id])) {
        $cart[$variation_id]['quantity']++;
    } else {
        $cart[$variation_id] = [
            "name" => $name,
            "price" => $price,
            "image" => $image,
            "quantity" => 1,
            "attributes" => $attributes
        ];
    }

    session()->put('cart', $cart);

    return response()->json(['success' => true]);
}

    
    
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('client-views.panier.panier', compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
    
        foreach ($request->input('quantities') as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
    
        session()->put('cart', $cart);
    
        // Calculate totals
        $cartSubtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
    
        $cartTotal = $cartSubtotal; // Add any other calculations if needed
    
        // Return JSON response
        return response()->json([
            'success' => true,
            'itemTotal' => $cart[$id]['price'] * $cart[$id]['quantity'],
            'cartSubtotal' => $cartSubtotal,
            'cartTotal' => $cartTotal,
        ]);
    }

    public function clearCart()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }
    public function removeCartItem(Request $request)
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            $cartCount = count($cart);
            $cartTotal = array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            return response()->json([
                'success' => true,
                'cartCount' => $cartCount,
                'cartTotal' => $cartTotal
            ]);
        }

        return response()->json(['success' => false]);
    }
    public function getCartDetails()
    {
        $cart = session()->get('cart', []);
        $cartTotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
    
        return response()->json([
            'cart' => $cart,
            'cartTotal' => $cartTotal
        ]);
    }
    


}
