<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CategoriesHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    private $page, $product, $productInfo, $gallery;
    private $cateHelper;
    public function __construct(Product $products, ProductInfo $productInfos, Gallery $galleries, CategoriesHelper $categoriesHelper)
    {
        $this->page = 6;
        $this->product = $products;
        $this->productInfo = $productInfos;
        $this->gallery = $galleries;
        $this->cateHelper = $categoriesHelper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->orderBy('id')->paginate($this->page);
        $productCount = $this->product->all()->count();
        return view('Admin.Products.products', compact('products', 'productCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $html = $this->cateHelper->dataTree('');
        return view('Admin.Products.action', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $productInfo = new $this->productInfo();
            $productInfo->namePublishing = $request->namePublishing;
            $productInfo->author = $request->author;
            $productInfo->translator = $request->translator;
            $productInfo->publishing = $request->publishing;
            $productInfo->year = $request->year;
            $productInfo->weight = $request->weight;
            $productInfo->size = $request->size;
            $productInfo->page = $request->page;
            $productInfo->formality = $request->formality;
            $productInfo->save();

            $imgDefault = $this->cateHelper->ImageResize($request->imagedefault, 'sanpham');
            $img = $request->gallery ? $this->cateHelper->ImageResize($request->gallery, 'sanpham') : null;
            $galleries = new $this->gallery();
            $galleries->imageDefault = $imgDefault;
            $galleries->image = $img;
            $galleries->save();

            $this->product->create([
                'name' => ucwords($request->name),
                'cateId' => $request->cateid,
                'productInfoId' => $productInfo->id,
                'galleryId' => $galleries->id,
                'price' => floatval(preg_replace('/[^\d.]/', '', $request->price)),
                'description' => $request->desc,
                'qty' => $request->qty,
                'status' => $request->status,
            ]);
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message:' . $e->getMessage() . '---- line:' . $e->getLine());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);
        $html = $this->cateHelper->dataTree($product->cateId);
        return view('Admin.Products.action', compact('html', 'product'));
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
        try {
            DB::beginTransaction();

            $price = floatval(preg_replace('/[^\d.]/', '', $request->price));
            $products = $this->product->find($id);
            $products->name = $request->name;
            $products->cateId = $request->cateid;
            if ($price > $products->price) {
                $products->priceOld = 0;
            } else {
                $products->priceOld = $products->price;
            }
            $products->price = $price;
            $products->description = $request->desc;
            $products->qty = $request->qty;
            $products->status = $request->status;
            $products->save();

            $productInfo = $this->productInfo->find($products->productInfoId);
            $productInfo->namePublishing = $request->namePublishing;
            $productInfo->author = $request->author;
            $productInfo->translator = $request->translator;
            $productInfo->publishing = $request->publishing;
            $productInfo->year = $request->year;
            $productInfo->weight = $request->weight;
            $productInfo->size = $request->size;
            $productInfo->page = $request->page;
            $productInfo->formality = $request->formality;
            $productInfo->save();

            $galleries = $this->gallery->find($products->galleryId);
            $img = $request->gallery ? $this->cateHelper->ImageResize($request->gallery, 'sanpham') : null;
            if ($img != null) {
                $imgs = explode("|", $galleries->image);
                if (count($imgs) > 1) {
                    for ($i = 0; $i < count($imgs); $i++) {
                        if (File::exists(public_path('uploads/sanpham/') . $imgs[$i])) {
                            unlink(public_path('uploads/sanpham/') . $imgs[$i]);
                        }
                    }
                }
            }
            if (isset($request->imagedefault)) {
                if (File::exists(public_path('uploads/sanpham/') . $galleries->imageDefault)) {
                    unlink(public_path('uploads/sanpham/') . $galleries->imageDefault);
                }
                $imgDefault = $this->cateHelper->ImageResize($request->imagedefault, 'sanpham');
                $galleries->imageDefault = $imgDefault;
            }
            $galleries->image = $img;
            $galleries->save();
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message:' . $e->getMessage() . '---- line:' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return back();
    }
}
