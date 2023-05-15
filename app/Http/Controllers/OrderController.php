<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->validate($request,[
            'user_id' => 'required',
            'product_id.*' => 'required',
            'quantity.*' => 'required',
        ]);

        $totalPrice = Product::whereIn('id', $request->product_id)->sum('price');
        $products_price = Product::whereIn('id', $request->product_id)->pluck(['product_id','price']);

        $order = Order::create([
            'total' => $totalPrice,
            'user_id' => 1,
            'payment_id' => 1,
            'statuse' => 1,
        ]);

        $products = [];

        foreach ($request->product_id as $key => $product_id) {
            // $product = Product::find($product_id);
            $products[$product_id] = ['quantity' => $request->quantity[$key],'price' => $products_price[$product_id]];
        }

        $order->product_order()->attach($request->product_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
