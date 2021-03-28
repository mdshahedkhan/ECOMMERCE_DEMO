<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $categories      = Category::where('root', Category::CategoryRoot)
            ->where('status', Category::ActiveItems)->get();
        $FeatureProducts = Product::where('feature_pro', 1)->get();
        return view('Site.index')->with(['Categories' => $categories, 'FeatureProducts' => $FeatureProducts]);
    }

    public function get_products($slug, $slug2, $slug3 = "")
    {
        if ($slug3) {
            $Category = Category::where('slug', $slug3)->pluck('id');
            $products = Product::where('category_id', $Category)->Active()->get();
        } else {
            $Category      = Category::where('slug', $slug2)->pluck('id');
            $categories    = Category::where('root', $Category)->Active()->get();
            $categories_id = $categories->pluck('id');
            $products      = Product::whereIn('category_id', collect($Category)->merge(collect($categories_id)))->Active()->get();
        }
        $brands_id       = $products->pluck('brand_id')->unique();
        $brands          = Brand::where('status', Brand::ACTIVE_BRAND)->whereIn('id', $brands_id)->select('name', 'status')->get();
        $FeatureProducts = Product::FEATUREPRODUCT()->get();
        return view('Site.categoryProduct')->with(['products' => $products, 'FeatureProducts' => $FeatureProducts, 'brands' => $brands]);
    }

    public function SingleProduct($slug)
    {
        $SingleProduct = Product::where('slug', $slug)->first();
        return view('Site.single-product')->with(['SingleProduct' => $SingleProduct]);
    }

    public function quickView(Request $request, $slug)
    {
        $quickView = Product::where('slug', $slug)->first();
        return view('Site.App.quickView')->with('quickView', $quickView);
    }


}
