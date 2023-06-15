<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;
use App\Models\AvailableDate;
use Illuminate\Http\Request;
use DateTime;


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
	public function update_day(Request $request, $id)
	{
		// フォームから送られてきた日付にアクセス：
		$dates = $request->input('dates');
		//$datesの数だけループして、データベースに保存する


		foreach ($dates as $date) {

			$available_date = new AvailableDate();
			$available_date->staff_number = $id;
			$available_date->date = $date;
			$available_date->save();
		}


		return redirect()->route('staff.edit', $id)->with('success', '作業可能日を更新しました。');
	}


	public function store(StoreStaffRequest $request)
	{
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
		//期間を取得
		$period = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth());

		$weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		$weekMap = [0, 1, 2, 3, 4, 5, 6];

		foreach ($period as $date) {
			$dates[] = $date->format('Y-m-d');
		}


		return view('staff_edit', compact('staff', 'available_dates', 'startDate', 'endDate', 'dates', 'period', 'weekDays', 'weekMap'));
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
