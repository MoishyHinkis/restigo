<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\ItemResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\SupllierResource;
use App\Models\Item;
use App\Models\Order;
use App\Models\Supllier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supllier = $request->input('supllier', 'all');
        $due = $request->input('due', null);

        $search = $request->input('search', '');
        return inertia('Orders', [
            'orders' => OrderResource::collection(Order::whereNotNull('sent_at')->when(
                $supllier != 'all',
                fn ($query) => $query->whereRelation('supllier', 'id', $request->supllier)
            )->when(
                $due,
                fn ($query) => $query->whereDate('due', $due)
            )
                ->when($search != '', fn ($query) => $query->where('id', $search))
                ->with('supllier')->get()),
            'suplliers' => SupllierResource::collection(Supllier::all()),
            'filters' => [
                'currentSupllier' => $supllier,
                'due' => $due,
                'search' => $search
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Supllier $supllier)
    {
        return inertia('NewOrder', [
            'suplliers' => fn () => SupllierResource::collection(Supllier::all()),
            'currentSupllier' => new SupllierResource($supllier->load('draftOrder.amounts.item')),
            'items' => fn () => ItemResource::collection($supllier->items->load('draftAmount'))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        Order::factory()->create([
            'supllier_id' => $request->supllier
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return inertia('Order', [
            'order' => new OrderResource($order->load('amounts'))
        ]);
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
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update(
            $request->validate(['due' => 'required|date|after:' . today()])

        );
        return redirect()->back();
    }

    public function send(Request $request, Order $order)
    {
        validator([
            'worth' => $order->worth,
            'min_order' => $order->supllier->min_order,
            'customer_number' => $order->supllier->customer_number,
            'due date' => $order->due
        ], [
            'worth' => 'gte:min_order',
            'customer_number' => 'required',
            'due date' => 'required'
        ])->validate();

        $order->update(['sent_at' => now()]);
        return redirect()->back();
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
