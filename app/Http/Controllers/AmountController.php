<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmountRequest;
use App\Http\Requests\UpdateAmountRequest;
use App\Models\Amount;
use App\Models\Order;
use Illuminate\Http\Request;

class AmountController extends Controller
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
     * @param  \App\Http\Requests\StoreAmountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmountRequest $request)
    {
        $order = null;
        if (validator($request->all(), ['order' => 'required'])->fails()) {
            $order =    Order::factory()->create(['supllier_id' => $request->supllier]);
        }

        Amount::factory()->create([
            'amount' => $request->input('amount', 0),
            'item_id' => $request->input('item'),
            'order_id' => $request->input('order', $order?->id)
        ]);
        return redirect()->back()->with('focus', $request->ref);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function show(Amount $amount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function edit(Amount $amount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAmountRequest  $request
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAmountRequest $request, Amount $amount)
    {

        $amount->update(['amount' => $request->amount ?? 0]);
        return redirect()->back()->with('focus', $request->ref);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amount  $amount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Amount $amount)
    {
        $amount->delete();
        return redirect()->back()->with('focus', $request->ref);
    }
}
