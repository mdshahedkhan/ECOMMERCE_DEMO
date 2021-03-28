<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

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

    public function StatusChange($id, $status)
    {
        $Slider         = Slider::find($id);
        $Slider->status = $status;
        $Slider->save();

    }
}
