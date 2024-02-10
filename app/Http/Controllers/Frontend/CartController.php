<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Breakfast;
use App\Models\Cake_Pastry;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $count = Cart::where('user_id', $user_id)->count();
        $shippingcharges=ShippingCharge::all();
        return view('frontend.cart.index', compact('carts', 'count', 'shippingcharges'));
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
    public function store(Request $request,$category, $id)
    {
        $request->validate([
            'name'     => 'nullable',
            'price'     => 'nullable',
            'quantity' => 'nullable|integer',
            'total'    => 'nullable|integer',
        ]);
        if($category == 'cake' ){
            $model = Cake_Pastry::class;
        }elseif($category == 'breakfast'){
            $model = Breakfast::class;
        } elseif ($category == 'dinner') {
            $model = Dinner::class;
        }elseif($category == 'lunch'){
            $model = Lunch::class;
        }
        $food = $model::where('id', $id)->first();
        if ($food) {
            Cart::create([
                'user_id' => Auth::user()->id,
                'food_id' => $id,
                'name'    => $food->name,
                'price'   => $food->price,
                'quantity'=> $request->quantity,
                'total'   => $food->price * $request->quantity,
            ]);
            return redirect(route('frontend.cart.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart=Cart::where('id',$request->cart_id)->where('user_id',Auth::user()->id)->first();
        $cart->update([
            'quantity'=>$request->quantity,
            'total'=>$request->quantity * $request->base_price
        ]);

        $subTotal = $cart->sum('total');
        return response()->json($subTotal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->forceDelete();
        return back()->with('success', 'Cart Deleted');
    }
    public function checkout(){
        $carts=Cart::where('user_id',Auth::user()->id)->get();
        return view('frontend.cart.checkout',compact('carts'));
    }
}
