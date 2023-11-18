<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    private $discount;
    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return back()->with('error', 'Vui lòng click <a href="' . route('authuser.index') . '">ở đây</a> để đăng nhập!');
        }
        $discount = $this->discount->where([['code', $request->code], ['status', 0]])->first();
        $discount_used = $this->discount->where([['used', 'LIKE', '%' . auth()->id() . '%'], ['code', $request->code], ['status', 0]])->first();
        if (!isset($discount)) {
            return back()->withInput()->with('error', 'Mã giảm giá không chính xác!');
        }
        if (isset($discount_used)) {
            return back()->withInput()->with('error', 'Mã giảm giá đã được sử dụng!');
        }
        $now = strtotime(date('M j, Y'));
        $start = strtotime(date("M j, Y", strtotime($discount->start)));
        $end = strtotime(date("M j, Y", strtotime($discount->end)));

        if ($end >= $now && $now >= $start) {
            $count[] = [
                'id' => $discount->id,
                'code' => $discount->code,
                'price' => $discount->price,
            ];
            session()->put('coupon', $count);
            return back()->with('success', 'Mã giảm giá đã được áp dụng');

        }
        return back()->withInput()->with('error', 'Mã giảm giá hết hạn!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
