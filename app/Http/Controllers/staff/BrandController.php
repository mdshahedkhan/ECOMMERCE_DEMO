<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Auth;
use Illuminate\Http\Request;
use Exception;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::get();
        return view('staff.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:20|unique:brands',
            'status' => 'required'
        ]);
        try {
            Brand::create([
                'create_by' => Auth::user()->id,
                'name' => $request->name,
                'slug' => slugify($request->name),
                'status' => $request->status
            ]);
            SetMessage('success', 'Yah! a brand has been successfully created');
        } catch (Exception $exception) {
            SetMessage('danger', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::find(base64_decode($id));
        return view('staff.brand.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $request->validate([
            'name' => 'required|min:3|max:20|unique:brands',
            'status' => 'required',
        ]);
        try {
            $brand = Brand::find($id);
            $brand->name = $request->name;
            $brand->slug = slugify($request->name);
            $brand->create_by = Auth::user()->id;
            $brand->status = $request->status;
            if ($brand->save()) {
                SetMessage('success', 'Yah! a brand has been successfully updated');
            }
        } catch (Exception $exception) {
            SetMessage('danger', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::destroy($id);
        return response()->json('Success');
    }

    public function StatusChange($id, $status)
    {
        $Brand = Brand::find($id);
        $Brand->status = $status;
        $Brand->save();
        return redirect()->back();
    }
}
