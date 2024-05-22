<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Order::create([
            'user_id'=> Auth::user()->id,
            'phone'=> $request->phone,
            'date'=> $request->date,
            'time'=> $request->time,
            'meal_id'=> $request->meal_id,
            'qty'=> $request->qty,
            'address'=> $request->address,
        ]);

        flash()->flash('success','Meal orderd Successfully',['timeout' => 3000, 'position' => 'top-center'],'Order done');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orders= Order::where('user_id',$id)->get();
        
        return view('orders.show_orders',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
