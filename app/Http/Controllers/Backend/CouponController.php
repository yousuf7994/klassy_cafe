<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coupons,name',
            'amount' => 'required|numeric',
            'limit' => 'required|numeric',
            'expire_date' => 'required|date',
        ]);
        Coupon::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'limit' => $request->limit,
            'expire_date' => $request->expire_date,
        ]);
        return back()->with('success', "Coupon Add Successful!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
    public function applyCoupon(Request $request)
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $coupon = Coupon::where('status', 1)->where('name', $request->coupon)->first();
        if ($coupon->expire_date < now()) {
            return back()->with('warning', 'Copun Date expired!');
        } elseif ($carts->sum('total') <= (int) $coupon->limit) {
            return back()->with('warning', 'Coupon not valid! Amount must be getter than ' . $coupon->limit);
        } else {
            $coupon = [
                'name' => $coupon->name,
                'amount' => $coupon->amount,
            ];
            Session::put('coupon',$coupon);
            return back();
        }
    }
}
