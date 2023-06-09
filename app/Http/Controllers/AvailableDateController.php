<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAvailableDateRequest;
use App\Http\Requests\UpdateAvailableDateRequest;
use App\Models\AvailableDate;

class AvailableDateController extends Controller
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
     * @param  \App\Http\Requests\StoreAvailableDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvailableDateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AvailableDate  $availableDate
     * @return \Illuminate\Http\Response
     */
    public function show(AvailableDate $availableDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AvailableDate  $availableDate
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailableDate $availableDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAvailableDateRequest  $request
     * @param  \App\Models\AvailableDate  $availableDate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAvailableDateRequest $request, AvailableDate $availableDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AvailableDate  $availableDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvailableDate $availableDate)
    {
        //
    }
}
