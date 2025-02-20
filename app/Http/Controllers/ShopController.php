<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Products;

class ShopController extends Controller
{
    
    public function shop(){
        $products = Products::all();
        return Inertia::render('Shop', ['products' => $products]);
    }
}
