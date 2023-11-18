<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CategoriesHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    private $page, $slider;
    private $cateHelper;
    public function __construct(Slider $sliders, CategoriesHelper $categoriesHelper)
    {
        $this->page = 6;
        $this->slider = $sliders;
        $this->cateHelper = $categoriesHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider->paginate($this->page);
        return view('Admin.Sliders.sliders', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Sliders.action');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->slider->create([
            'name' => ucwords($request->name),
            'desc' => $request->desc,
            'link' => $request->link,
            'image' => $this->cateHelper->ImageResize($request->imagedefault, 'slider', 1452, 599),
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = $this->slider->find($id);
        return view('Admin.Sliders.action', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = $this->slider->find($id);
        if (isset($request->imagedefault)) {
            if (File::exists(public_path('uploads/slider/') . $slider->image)) {
                unlink(public_path('uploads/slider/') . $slider->image);
            }
            $image = $this->cateHelper->ImageResize($request->imagedefault, 'slider', 1452, 599);
        }
        $slider->update([
            'name' => ucwords($request->name),
            'desc' => $request->desc,
            'link' => $request->link,
            'image' => isset($image) ? $image : $slider->image,
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->slider->find($id)->delete();
        return redirect()->back();
    }
}
