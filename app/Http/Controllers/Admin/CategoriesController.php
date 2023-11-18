<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CategoriesHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $page, $category;
    private $cateHelper;
    public function __construct(Category $categories, CategoriesHelper $categoriesHelper)
    {
        $this->page = 6;
        $this->category = $categories;
        $this->cateHelper = $categoriesHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = $this->category->orderBy('id')->paginate($this->page);
        $categoryCount = $this->category->all()->count();
        return view('Admin.Categories.categories', compact('category', 'categoryCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = $this->cateHelper->dataTree('');
        return view('Admin.Categories.action', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->category->create([
            'name' => ucwords($request->name),
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
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
        $category = $this->category->find($id);
        $html = $this->cateHelper->dataTree($category->parent_id);
        return view('Admin.Categories.action', compact('html', 'category'));
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
        $category = $this->category->find($id);
        $category->name = ucwords($request->name);
        $category->parent_id = $request->parent_id == 0 ? null : $request->parent_id;
        $category->save();

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
        $this->category->find($id)->delete();
        return back();
    }
}
