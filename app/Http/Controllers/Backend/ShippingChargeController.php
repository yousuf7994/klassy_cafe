<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sCharges=ShippingCharge::all();
        return view('backend.shipping_charge.index',compact('sCharges'));
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
            "location" => 'required',
            "charge" => 'required|numeric',
        ]);
        ShippingCharge::create([
            "location" => $request->location,
            "charge" => $request->charge,
        ]);
        return back()->with('success', 'Shipping Charge Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingCharge $shippingCharge)
    {
        //
    }
    public function applyCharge(Request $request){
        $data = ShippingCharge::where('id', $request->location_id)->first();
        /* $cart_total= Cart::where('user_id', Auth::user()->id)->sum('total');
        $grand_total=($cart_total - (Session::get('coupon')['amount'] ?? 0)) + $data->charge;

        $shipping = [
            'shipping_charge' => $data->charge,
            'grand_total' => $grand_total,
        ]; */
        Session::put('shipping_charge', $data->charge);
        return response()->json($data);
    }
}
