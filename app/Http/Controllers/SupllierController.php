<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupllierRequest;
use App\Http\Requests\UpdateSupllierRequest;
use App\Http\Resources\SupllierResource;
use App\Models\Supllier;

class SupllierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index()
    {
        $suplliers = Supllier::all();
        return inertia('NewOrder', [
            'suplliers' => SupllierResource::collection($suplliers),
        ]);
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
     * @param  \App\Http\Requests\StoreSupllierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupllierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supllier  $supllier
     * @return \Illuminate\Http\Response
     */
    public function show(Supllier $supllier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supllier  $supllier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supllier $supllier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupllierRequest  $request
     * @param  \App\Models\Supllier  $supllier
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupllierRequest $request, Supllier $supllier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supllier  $supllier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supllier $supllier)
    {
        //
    }
}
