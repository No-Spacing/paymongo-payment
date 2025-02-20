<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;

use Luigel\Paymongo\Facades\Paymongo;

use Inertia\Inertia;

class CustomerController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = DB::table('products')
        ->where('id', $request->id)->first();
        
        Cart::create([
            'productID' => $request->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description
        ]);

        return redirect('cart');
    }

    public function Cart(){
        $carts = Cart::all();
        return Inertia::render('Cart', ['carts' => $carts]);
    }

    public function payment(){
 
        $total = DB::table('carts')->sum('price');

        // Paymongo creates a link for payment gateway
        $link = Paymongo::link()->create([
            'amount' => $total,
            'description' => 'Payment in Products',
            'remarks' => 'laravel-paymongo'
        ]);

        // Visits the created payment link
        return redirect($link->checkout_url);
    }
}
