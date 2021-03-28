<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('staff.product.index')->with(['products' => $products]);
    }

    public function fetchData(Request $request)
    {
        $products = Product::paginate(10);
        return view('staff.product.pagination')->with(['products' => $products]);
    }


    public function create()
    {
        $category = Category::where('root', 0)->get();
        $brand    = Brand::get();
        return view('staff.product.create', compact('category', 'brand'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:4|max:50|unique:products',
            'slug'          => 'required',
            'buying_price'  => 'required',
            'selling_price' => 'required',
            'quantity'      => 'required',
            'status'        => 'required',
            'description'   => 'required',
            'sku_code'      => 'required',
        ]);
        if (!$validator->fails()) {
            try {
                $product = new Product();
                if ($request->hasFile('image') || $request->hasFile('image')) {
                    $thumb     = $request->file('thumbnail');
                    $Thumbnail = date('Ymdhis') . uniqid() . '.' . $thumb->getClientOriginalExtension();
                    $thumb->move(public_path('./uploads/product/'), $Thumbnail);
                    $i          = 1;
                    $imagesFile = $request->file('image');
                    $imageName  = [];
                    foreach ($imagesFile as $img) {
                        $image = $i++ . date('Ymdhis') . uniqid() . '.' . $img->getClientOriginalExtension();
                        $img->move(public_path('./uploads/product/'), $image);
                        //Image::make($img)->resize(400, 100)->save(public_path('./uploads/product/') . $image);
                        array_push($imageName, $image);
                    }
                    $product->thumbnail = $Thumbnail;
                    $product->image     = json_encode($imageName);
                }
                $product->create_by               = \Auth::user()->id;
                $product->name                    = $request->name;
                $product->slug                    = $request->slug;
                $product->category_id             = $request->category;
                $product->special_price_yes_or_no = $request->special_price_yes_or_no == 1 ? 'yes' : 'no';
                $product->brand_id                = $request->brand;
                $product->model                   = $request->model;
                $product->buying_price            = $request->buying_price;
                $product->selling_price           = $request->selling_price;
                $product->special_price           = $request->special_price;
                $product->special_price_form      = $request->special_price_form;
                $product->special_price_to        = $request->special_price_to;
                $product->quantity                = $request->quantity;
                $product->sku_code                = $request->sku_code;
                $product->warranty                = $request->warranty;
                $product->warranty_duration       = $request->warranty_duration;
                $product->warranty_condition      = $request->warranty_description;
                $product->color                   = json_encode($request->color);
                $product->size                    = json_encode($request->size);
                $product->status                  = $request->status;
                $product->save();
                return response()->json(['success_message' => 'Yah! a product has been successfully created']);
            } catch (Exception $exception) {
                return response()->json(['error' => $exception->getMessage()]);
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }


    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [

                'name'          => 'required|min:4|max:50|unique:products,name,' . $id,
                'slug'          => 'required',
                'buying_price'  => 'required',
                'selling_price' => 'required',
                'quantity'      => 'required',
                'status'        => 'required',
                'description'   => 'required',
                'sku_code'      => 'required',
            ]);
            if (!$validator->fails()) {
                try {
                    $product = Product::find($id);
                    if (!empty($request->file('thumbnail'))) {
                        $thumb     = $request->file('thumbnail');
                        $Thumbnail = date('Ymdhis') . uniqid() . '.' . $thumb->getClientOriginalExtension();
                        $thumb->move(public_path('./uploads/product/'), $Thumbnail);
                        $product->thumbnail = $Thumbnail;
                    }
                    if (!empty($request->file('image'))) {
                        $i          = 1;
                        $imagesFile = $request->file('image');
                        $imageName  = [];
                        foreach ($imagesFile as $img) {
                            $image = $i++ . date('Ymdhis') . uniqid() . '.' . $img->getClientOriginalExtension();
                            $img->move(public_path('./uploads/product/'), $image);
                            //Image::make($img)->resize(400, 100)->save(public_path('./uploads/product/') . $image);
                            array_push($imageName, $image);
                        }
                        $product->image = json_encode($imageName);
                    }
                    $product->create_by               = \Auth::user()->id;
                    $product->name                    = $request->name;
                    $product->slug                    = $request->slug;
                    $product->category_id             = $request->category;
                    $product->special_price_yes_or_no = $request->special_price_yes_or_no == 1 ? 'yes' : 'no';
                    $product->brand_id                = $request->brand;
                    $product->model                   = $request->model;
                    $product->buying_price            = $request->buying_price;
                    $product->selling_price           = $request->selling_price;
                    $product->special_price           = $request->special_price;
                    $product->special_price_form      = $request->special_price_form;
                    $product->special_price_to        = $request->special_price_to;
                    $product->quantity                = $request->quantity;
                    $product->sku_code                = $request->sku_code;
                    $product->warranty                = $request->warranty;
                    $product->warranty_duration       = $request->warranty_duration;
                    $product->warranty_condition      = $request->warranty_description;
                    $product->color                   = json_encode($request->color);
                    $product->size                    = json_encode($request->size);
                    $product->status                  = $request->status;
                    $product->save();
                    return response()->json(['success_message' => 'Yah! a product has been successfully Updated']);
                } catch (Exception $exception) {
                    return response()->json(['error' => $exception->getMessage()]);
                }
            } else {
                return response()->json(['error' => $validator->errors()]);
            }
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists(public_path('uploads/product/' . $product->thumbnail))) {
            unlink(public_path('uploads/product/' . $product->thumbnail));
        }
        if ($product->image !== null) {
            foreach (json_decode($product->image) as $image) {
                if (file_exists(public_path('uploads/product/' . $image))) {
                    unlink(public_path('uploads/product/' . $image));
                }
            }
        }
        Product::destroy($id);
        return response()->json('Success');
    }

    public function edit($id)
    {
        $id       = base64_decode($id);
        $product  = Product::find($id);
        $category = Category::where('root', 0)->get();
        $brand    = Brand::get();
        return view('staff.product.create')->with(['products' => $product, 'category' => $category, 'brand' => $brand]);
    }


    public function ChangeStatus($id, $status)
    {
        $Product         = Product::find($id);
        $Product->status = $status;
        if ($Product->save()) {
            return response()->json(['Success' => 'Yah! a product status has been successfully changed']);
        } else {
            return response()->json(['error' => 'error occould']);
        }
    }

    public function featureProduct(Request $request)
    {
        if ($request->ajax()) {
            $product              = Product::find($request->id);
            $product->feature_pro = $request->status;
            $product->save();
            return response()->json('Success');
        }
    }

    public function PriceUpdate(Request $request)
    {
        if ($request->ajax()) {
            $ProductPrice               = Product::find($request->id);
            $ProductPrice->buying_price = $request->price;
            $ProductPrice->save();
            return response()->json('Success');
        }
    }

    public function MultiItemsDelete(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->checkItems)) {
                $i = 0;
                foreach ($request->checkItems as $item) {
                    $product = Product::find($item);
                    if (file_exists(public_path('uploads/product/' . $product->thumbnail))) {
                        unlink(public_path('uploads/product/' . $product->thumbnail));
                    }
                    if ($product->image !== null) {
                        foreach (json_decode($product->image) as $image) {
                            if (file_exists(public_path('uploads/product/' . $image))) {
                                unlink(public_path('uploads/product/' . $image));
                            }
                        }
                    }
                    Product::destroy($item);
                    $i++;
                }
                return response()->json('Yah! your ' . $i . ' product has been successfully deleted');

            } else {
                return response()->json("Empty Items Delete Hobena!");
            }
        }
    }

    // Multi Product Status  == Active Method
    public function MultiItemsActive(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->checkItems)) {
                $i = 0;
                foreach ($request->checkItems as $checkItem) {
                    $product         = Product::find($checkItem);
                    $product->status = 'active';
                    $product->save();
                    $i++;
                }
                return response()->json('Yah! your ' . $i . ' product has been successfully active');
            } else {
                return response()->json('Empty Product Active Hobena');
            }
        }
    }

    // Multi Product Status  == Inactive Method
    public function MultiItemsInactive(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->checkItems)) {
                $i = 0;
                foreach ($request->checkItems as $checkItem) {
                    $product         = Product::find($checkItem);
                    $product->status = 'inactive';
                    $product->save();
                    $i++;
                }
                return response()->json('Yah! your ' . $i . ' product has been successfully inactive');
            } else {
                return response()->json('Empty Product Inactive Hobena');
            }
        }
    }


}
