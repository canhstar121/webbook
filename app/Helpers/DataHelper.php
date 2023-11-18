<?php
namespace App\Helpers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderCustomer;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DataHelper
{
    private $product, $order, $orderDetail, $orderCustomer, $discount;
    public function __construct(Product $product, Order $order, OrderDetail $orderDetail, OrderCustomer $orderCustomer, Discount $discount)
    {
        $this->product = $product;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->orderCustomer = $orderCustomer;
        $this->discount = $discount;
    }

    public function showCate($result, $query, $cate)
    {
        $mucGia = [];
        $tuKhoa = null;
        $sapXep = null;
        $boLoc = null;

        $categories = $cate;
        $products = $this->product->select('products.*', $query)
            ->with('ProToCate')
            ->where([['cateId', $result->id], ['status', 0]])
            ->get();
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

        $products = $this->showDataProducts($query, $boLoc, $tuKhoa, $sapXep, $mucGia, $result->id);

        return view('User.all', compact('products', 'random', 'randomOther', 'result', 'categories'));
    }

    public function showPro($result, $query)
    {
        $product = $result;
        $productlike = $this->product->select('products.*', DB::raw('COUNT(*) as count'), $query)
            ->where([['cateId', $product->cateId], ['status', 0], ['id', '<>', $product->id]])
            ->get();
        if ($productlike[0]['count'] == 0) {
            $productlike = $this->product->select('products.*', $query)
                ->where('status', 0)
                ->inRandomOrder()
                ->get();
        }

        return view('User.detail', compact('product', 'productlike'));
    }

    public function showDataProducts($query, $boLoc = null, $tuKhoa = null, $sapXep = null, $mucGia = [], $pageTheLoai = null)
    {
        $danhSachSanPham = $this->product->select('products.*', $query)->with('ProToCate')->where('status', 0);
        if (!empty($pageTheLoai)) {
            $danhSachSanPham = $danhSachSanPham->where('cateId', $pageTheLoai);
        }
        if (!empty($boLoc)) {
            if ($boLoc != 0) {
                $danhSachSanPham = $danhSachSanPham->whereIn('cateId', [$boLoc]);
            }
        }
        if (!empty($mucGia)) {
            $danhSachSanPham = $danhSachSanPham->where(function ($query1) use ($mucGia) {
                for ($i = 0; $i < count($mucGia); $i++) {
                    $query1->orwhere(function ($query2) use ($mucGia, $i) {
                        $query2->whereBetween('price', [$mucGia[$i][0], $mucGia[$i][1]]);
                    });
                }
            });
        }
        if (!empty($tuKhoa)) {
            $danhSachSanPham = $danhSachSanPham->where(function ($query) use ($tuKhoa) {
                $query->orWhere('name', 'like', '%' . $tuKhoa . '%');
                $query->orWhere('description', 'like', '%' . $tuKhoa . '%');
                $query->orWhere('price', 'like', '%' . $tuKhoa . '%');
            });
        }
        if (!empty($sapXep)) {
            if ($sapXep == 'moinhat') {
                $danhSachSanPham = $danhSachSanPham->orderBy('created_at', 'DESC');
            } else if ($sapXep == 'banchaynhat') {
                $danhSachSanPham = $danhSachSanPham->leftJoin('order_details', 'order_details.proId', '=', 'products.id')
                    ->orderBy(DB::raw('SUM(order_details.qtyBuy)'), 'DESC');
            } else if ($sapXep == 'giatangdan') {
                $danhSachSanPham = $danhSachSanPham->orderBy('price', 'ASC');
            } else if ($sapXep == 'giagiamdan') {
                $danhSachSanPham = $danhSachSanPham->orderBy('price', 'DESC');
            }
        } else {
            $danhSachSanPham = $danhSachSanPham->orderBy('created_at', 'DESC');
        }
        $danhSachSanPham = $danhSachSanPham->get();
        return $danhSachSanPham;
    }

    public function AddOrder($name, $phone, $address, $note, $payment)
    {
        try {
            DB::beginTransaction();
            $subTotal = 0;
            foreach (Cart::content() as $item) {
                $subTotal += $item->price * $item->qty;
            }
            $total = $subTotal;
            if (session()->has('coupon')) {
                $total = $subTotal - session()->get('coupon')[0]['price'];
            }

            // $data = $result->transactions[0]->item_list;
            $customer = $this->orderCustomer->create([
                'userId' => Auth::id(),
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'note' => $note,
            ]);
            $order = $this->order->create([
                'cusId' => $customer->id,
                'discountId' => session()->has('coupon') ? session()->get('coupon')[0]['id'] : null,
                'status' => $payment == 0 ? 1 : 2,
                'totalPrice' => $total,
                'debt' => $payment == 0 ? $total : 0,
                'payment' => $payment,
            ]);
            foreach (Cart::content() as $item) {
                $this->orderDetail->create([
                    'orderId' => $order->id,
                    'proId' => $item->id,
                    'qtyBuy' => $item->qty,
                    'price' => $item->price,
                ]);
                $product = $this->product->find($item->id);
                $qty = $product->qty - $item->qty;
                $product->update(['qty' => $qty > 0 ? $qty : 0]);
            }
            if (Session::has('coupon')) {
                foreach (Session::get('coupon') as $coun) {
                    $coupon = $this->discount->where('code', $coun['code'])->first();
                    $coupon->used = ',' . Auth::id();
                    $coupon->save();
                }
            }
            Session::forget('cart');
            Session::forget('coupon');

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('message:' . $e->getMessage() . '---- line:' . $e->getLine());
            return redirect()->route('cart.create')->with('error', 'Payment failed');
        }
    }
}
