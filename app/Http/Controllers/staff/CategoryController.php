<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::where('root', 0)->orderBy('name', 'DESC')->get();
        return view('staff.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('root', 0)->get();
        return view('staff.category.create', compact('category'));
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
            'root'   => 'required',
            'name'   => 'required|min:3|max:30|unique:categories',
            'status' => 'required'
        ]);
        try {
            $category            = new Category();
            $category->create_by = \Auth::user()->id;
            $category->root      = $request->root;
            $category->name      = $request->name;
            $category->slug      = slug($request->name);
            $category->status    = $request->status;
            $category->save();
            SetMessage('success', 'Yah! a category has been successfully! created');
        } catch (\Exception $exception) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data     = Category::find(base64_decode($id));
        $category = Category::where('root', 0)->get();
        return view('staff.category.create', compact('data', 'category'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required|min:3|max:30',
            'root'   => 'required',
            'status' => 'required'
        ]);
        try {
            $id                  = base64_decode($id);
            $Category            = Category::find($id);
            $Category->create_by = Auth::user()->id;
            $Category->root      = $request->root;
            $Category->name      = $request->name;
            $Category->status    = $request->status;
            $Category->save();
            SetMessage('success', 'Yah! a category has been successfully updated');
        } catch (Exception $exception) {
            SetMessage('danger', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $cat = Category::where('root', base64_decode($id))->get();
        if (!count($cat)) {
            $Category = Category::find(base64_decode($id));
            $Category->delete();
            return response()->json('success');
        }
        return response()->json(['message' => 'Age Child Category Delete kore ashen']);
    }

    public function ChangeStatus($id, $status)
    {
        $Category         = Category::find($id);
        $Category->status = $status;
        $Category->save();
        return response()->json(['Success']);
    }
}
