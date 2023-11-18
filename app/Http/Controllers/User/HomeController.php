<?php

namespace App\Http\Controllers\User;

use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $showResult, $query, $category, $product, $slider;
    public function __construct(Product $products, Category $category, Slider $slider, DataHelper $dataHelper)
    {
        // $this->showResult = new DataHelper;
        $this->showResult = $dataHelper;
        $this->query = DB::raw('IF(products.created_at >= "' . Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek()->toDateString() . '" AND products.created_at <= "' . Carbon::now('Asia/Ho_Chi_Minh')->endOfWeek()->toDateString() . '", 0, 1) as newPro');
        $this->category = $category;
        $this->product = $products;
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = $this->query;

        $sliders = $this->slider->where('status', 0)->get();
        $newProduct = $this->product->select('products.*', $query)
            ->orderBy('products.id', 'desc')
            ->get();
        $saleProduct = $this->product->select('products.*', $query)
            ->where('priceOld', '>', 0)
            ->get();
        $topProduct = $this->product->with('ProToCate')->select('products.*', DB::raw('COUNT(a.proId) as countPro'), $query)
            ->join('order_details as a', 'a.proId', 'products.id')
            ->groupBy('products.id')
            ->orderBy('countPro', 'desc')
            ->get();
        $cateTop3 = $this->category->select('id', 'name')->whereNull('parent_id')
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('User.index', compact('sliders', 'newProduct', 'saleProduct', 'topProduct', 'cateTop3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mucGia = [];
        $tuKhoa = null;
        $sapXep = null;
        $boLoc = null;

        $categories = $this->category->all();
        $random = $this->product->where('status', 0)
            ->inRandomOrder()
            ->get();
        $randomOther = $this->product->where([['status', 0], ['id', '<>', $random[0]['id']]])
            ->inRandomOrder()
            ->limit(2)
            ->get();

        if (!empty(request()->mucgia)) {
            $mucgia = explode(',', request()->mucgia);
            if (in_array('duoi100', $mucgia)) {
                $mucGia[] = [0, 100000];
            }
            if (in_array('100300', $mucgia)) {
                $mucGia[] = [100000, 300000];
            }
            if (in_array('300500', $mucgia)) {
                $mucGia[] = [300000, 500000];
            }
            if (in_array('tren500', $mucgia)) {
                $mucGia[] = [500000, 2000000000];
            }
        }
        if (!empty(request()->sapxep)) {
            $sapXep = request()->sapxep;
        }
        if (!empty(request()->txtSearch)) {
            $tuKhoa = request()->txtSearch;
        }
        if (!empty(request()->txtCate)) {
            $boLoc = request()->txtCate;
        }

        $products = $this->showResult->showDataProducts($this->query, $boLoc, $tuKhoa, $sapXep, $mucGia);

        return view('User.all', compact('products', 'random', 'randomOther', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (isset($request->addToCart)) {
        $product = $this->product->find($request->id);
        $data['id'] = $product->id;
        $data['qty'] = $request->qty;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = $product->qty;
        $data['options']['image'] = $product->ProToGall->imageDefault;
        $data['options']['slug'] = $product->slug;

        Cart::add($data);

        return response()->json([
            'status' => 200,
        ]);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->category->where('slug', $id)->orwhere('id', $id)->first();
        if ($result) {
            return $this->showResult->showCate($result, $this->query, $this->category->all());
        }

        $result = $this->product->where('slug', $id)->orwhere('id', $id)->first();
        if ($result) {
            return $this->showResult->showPro($result, $this->query);
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
