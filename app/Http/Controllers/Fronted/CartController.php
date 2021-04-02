<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::getContent();
        return view('Site.checkout', compact('items'));
    }

    public function Store(Request $request)
    {
        $product = Product::where('slug', $request->slug)->first();
        $Exists  = Cart::getContent();
        $itemId  = $product->id;
        if ($product->id !== Cart::get($itemId)) {
            $Sp_price = false;
            if ($product->special_price_form == date('Y-m-d') && $product->special_price_to == date('Y-m-d')) {
                $Sp_price = true;
            }
            if ($Sp_price) {
                $price = $product->special_price;
            } else {
                $price = $product->selling_price;
            }
            Cart::add([
                'id'         => $product->id,
                'name'       => $product->name,
                'price'      => $price,
                'quantity'   => $price,
                'attributes' => array(
                    'thumbnail' => $product->thumbnail,
                    'slug'      => $product->slug
                ),
            ]);
            return response()->json(['message' => 'This product has successfully added.']);
        } else {
            return response()->json(['error' => 'This product has already been taken.']);
        }

    }
}
