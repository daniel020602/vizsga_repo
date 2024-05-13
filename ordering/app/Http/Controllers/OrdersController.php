<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index',['orders'=>Order::query()->join('products','orders.product','=','products.id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        //dd($product);
        return view('orders.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        //dd($request);
        $validated =$request->validated();
        //dd($validated);
        Order::create($validated);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $orders)
    {
        $validated=$request->validated();
        $orders->update($validated);
        return redirect()->route('orders.show',['order'=>$orders]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $orders)
    {
        $orders->delete();
    }
}
