<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('title', 'ASC')->get();
        return view('staff.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('staff.slider.create');
    }

    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'title'      => 'required|min:5|max:30',
            'sub_title'  => 'required|min:5|max:60',
            'url'        => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
            'image'      => 'required',
        ]);
        if (!$Validator->fails()) {
            try {
                $Slider = new Slider();
                $img    = $request->file('image');
                if ($img->isValid()) {
                    $image = date('Ymdhis') . uniqid() . '.' . $img->getClientOriginalExtension();
                    $img->move(public_path('uploads/slider/'), $image);
                    $Slider->image = $image;
                }
                $Slider->create_by  = Auth::id();
                $Slider->title      = $request->title;
                $Slider->sub_title  = $request->sub_title;
                $Slider->url        = $request->url;
                $Slider->start_date = $request->start_date;
                $Slider->end_date   = $request->end_date;
                $Slider->save();
                SetMessage('success', 'Yah! a slider has been successfully! created');
                return redirect()->back();
            } catch (Exception $exception) {
                return response()->json(['error' => $exception->getMessage()]);
            }
        } else {
            return response()->json(['error' => $Validator->errors()]);
        }
    }

    public function StatusChange($id, $status)
    {
        $Slider         = Slider::find($id);
        $Slider->status = $status;
        $Slider->save();
    }

}
