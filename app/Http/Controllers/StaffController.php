<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;
use App\Models\AvailableDate;


class StaffController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$staff = Staff::all();

		return view('staff', compact('staff'));
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
	 * @param  \App\Http\Requests\StoreStaffRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreStaffRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Staff  $staff
	 * @return \Illuminate\Http\Response
	 */
	public function show(Staff $staff)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Staff  $staff
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{

		$staff = Staff::find($id);
		//作業可能日を取得
		$available_dates = AvailableDate::where('staff_number', $id)->get();

		// dd($available_dates);
		$startDate = \Carbon\Carbon::now()->startOfMonth()->toDateString();
		$endDate = \Carbon\Carbon::now()->endOfMonth()->toDateString();
		$dates = [];
		$period = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth());
		foreach ($period as $date) {
			$dates[] = $date->format('Y-m-d');
		}




		return view('staff_edit', compact('staff', 'available_dates', 'startDate', 'endDate', 'dates', 'period'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateStaffRequest  $request
	 * @param  \App\Models\Staff  $staff
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateStaffRequest $request, Staff $staff)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Staff  $staff
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Staff $staff)
	{
		//
	}
}
