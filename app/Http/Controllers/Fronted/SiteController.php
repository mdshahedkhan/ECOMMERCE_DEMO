<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use function PHPUnit\Framework\exactly;

class SiteController extends Controller
{
    public function index()
    {
        $Sliders         = Slider::where('status', 'active')->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->get();
        $categories      = Category::where('root', Category::CategoryRoot)->where('status', 'active')->get();
        $FeatureProducts = Product::Active()->where('feature_pro', 1)->get();
        return view('Site.index')->with(['Categories' => $categories, 'Sliders' => $Sliders, 'FeatureProducts' => $FeatureProducts]);
    }

    public function get_products($slug, $slug2, $slug3 = "")
    {
        if ($slug3) {
            $Category = Category::where('slug', $slug3)->pluck('id');
            $products = Product::where('category_id', $Category)->Active()->get();
        } else {
            $Category      = Category::where('slug', $slug2)->pluck('id');
            $categories    = Category::where('root', $Category)->where('status', 'active')->get();
            $categories_id = $categories->pluck('id');
            $products      = Product::whereIn('category_id', collect($Category)->merge(collect($categories_id)))->where('status', 'active')->get();
        }
        // Get Brand Id With Product
        $brands_id = $products->pluck('brand_id')->unique();
        // Receive Brand With Product & Brand Counting Get
        $brands = Brand::select('id', 'name', 'status')->with('products')->where('status', Brand::ACTIVE_BRAND)->whereIn('id', $brands_id)->get()
            ->map(function ($brand) use ($products) {
                $brand->products = $products->where('brand_id', $brand->id);
                return $brand;
            });
        // Feature Product Get With Brand id
        $FeatureProducts = Product::FEATUREPRODUCT()->get();
        $feature_product = Product::where('feature_pro', 1)->where('status', 'active')->get();
        $category        = Category::where('root', 0)->where('status', 'active')->get();
        return view('Site.categoryProduct', compact('products', 'category', 'feature_product', 'FeatureProducts', 'brands'));
    }

    public function SingleProduct($slug)
    {
        $SingleProduct   = Product::where('slug', $slug)->first();
        $related_product = Product::where('status', 'active')->where('category_id', $SingleProduct->category_id)->get();
        $feature_product = Product::where('feature_pro', 1)->get();
        $category        = Category::where('root', 0)->where('status', 'active')->get();
        return view('Site.single-product')->with(['SingleProduct' => $SingleProduct, 'category' => $category, 'feature_product' => $feature_product, 'related_product' => $related_product]);
    }

    public function QuickViewProduct($slug)
    {
        $QuickView = Product::where('slug', $slug)->first();
        return view('Site.App.quickView', compact('QuickView'));
    }


}
