<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Cart;

class SiteController extends Controller
{
    public function index()
    {
        $Sliders         = Slider::where('status', 'active')->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->get();
        $categories      = Category::where('root', Category::CategoryRoot)->where('status', 'active')->get();
        $FeatureProducts = Product::Active()->where('feature_pro', 1)->get();
        return view('Site.index')->with(['Categories' => $categories, 'Sliders' => $Sliders, 'FeatureProducts' => $FeatureProducts]);
    }

    protected $slug3;
    protected $slug2;

    public function get_products($slug, $slug2, $slug3 = "")
    {
        if ($slug3) {
            $Category           = Category::where('slug', $slug3)->pluck('id');
            $GLOBALS['Product'] = $products = Product::where('category_id', $Category)->Active()->get();
        } else {
            $Category           = Category::where('slug', $slug2)->pluck('id');
            $categories         = Category::where('root', $Category)->where('status', 'active')->get();
            $categories_id      = $categories->pluck('id');
            $GLOBALS['Product'] = $products = Product::whereIn('category_id', collect($Category)->merge(collect($categories_id)))->where('status', 'active')->limit(10)->get();
        }
        $brands_id       = $products->pluck('brand_id')->unique();
        $brands          = Brand::select('id', 'name', 'status')->with('products')->where('status', Brand::ACTIVE_BRAND)
            ->whereIn('id', $brands_id)->get()
            ->map(function ($brand) use ($products) {
                $brand->products = $products->where('brand_id', $brand->id);
                return $brand;
            });
        $FeatureProducts = Product::FEATUREPRODUCT()->get();
        $feature_product = Product::where('feature_pro', 1)->where('status', 'active')->get();
        $category        = Category::where('root', 0)->where('status', 'active')->get();
        return view('Site.categoryProduct', compact('products', 'category', 'feature_product', 'FeatureProducts', 'brands'));
    }

    public function Load_More_product(Request $request)
    {
        $request->all();
        if ($request->ajax()) {
            if ($this->slug3) {
                $product = $GLOBALS['Product']->where('status', 'active')->where('id', '<', $request->id)->limit(10)->get();
            } else {
                $product = $GLOBALS['Product']->where('status', 'active')->where('id', '<', $request->id)->limit(10)->get();
            }
            return view('Site.load_more_product', compact('product'));
        }
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

    public function Get_All_products()
    {
        $category = Category::where('root', Category::CategoryRoot)->where('status', 'active')->get();
        return view('Site.All-Products', compact('category'));
    }

    public function Load_More_Data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id) {
                $data = Product::orderBy('id', 'DESC')->where('status', 'active')->where('id', '<', $request->id)->limit(10)->get();
            } else {
                $data = Product::orderBy('id', 'DESC')->where('status', 'active')->limit(10)->get();
            }
            return view('Site.components.load-more', compact('data'));
        }
    }

    public function Search(Request $request)
    {
        $Searching_product = str_replace('%', ' ', $request->search);
        $result            = Product::where('name', 'like', '%' . $Searching_product . '%')->Active()->get();
        return view('Site.search', compact('result', 'Searching_product'))->with(['data' => $result]);
    }

}
