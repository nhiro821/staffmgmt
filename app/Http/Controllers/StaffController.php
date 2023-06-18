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

		// Convert each date to Y-m-d format for comparison
		$dates = $dates ?: [];
		$dates = array_map(function ($date) {
			return (new DateTime($date))->format('Y-m-d');
		}, $dates);

		if (empty($dates)) {
			// 一旦チェックボックスの入ってない該当スタッフ当月の日付はクリアにする。
			AvailableDate::where('staff_number', $id)
				->whereYear('date', now()->year)
				->whereMonth('date', now()->month)
				->delete();
		} else {
			// First, find all existing dates for the given staff number in the same month
			$existing_dates = AvailableDate::where('staff_number', $id)
				->whereYear('date', (new DateTime($dates[0]))->format('Y'))
				->whereMonth('date', (new DateTime($dates[0]))->format('m'))
				->get();


			foreach ($existing_dates as $existing_date) {
				// Convert existing_date to Y-m-d format for comparison
				$existing_date_format = (new DateTime($existing_date->date))->format('Y-m-d');

				// If the existing date is not in the new dates array, delete it
				if (!in_array($existing_date_format, $dates)) {
					AvailableDate::where('id', $existing_date->id)->delete();
				}
			}

			foreach ($dates as $date) {
				// Check if the date already exists for the staff
				$existing_date = $existing_dates->first(function ($existing_date) use ($date) {
					// Convert existing_date to DateTime object
					$existing_date_time = (new DateTime($existing_date->date))->format('Y-m-d');

					return $date == $existing_date_time;
				});

				// If the date does not exist, create new date entry
				if (!$existing_date) {
					$available_date = new AvailableDate();
					$available_date->staff_number = $id;
					$available_date->date = $date;
					$available_date->save();
				}
			}
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

		$thismonth = now()->month;


		//next系
		$nextmonth = now()->addMonth()->month;
		$nextMonthStart = \Carbon\Carbon::now()->addMonth()->startOfMonth();
		$nextMonthEnd = \Carbon\Carbon::now()->addMonth()->endOfMonth();
		$period = \Carbon\CarbonPeriod::create($nextMonthStart, $nextMonthEnd);
		$nextperiod = \Carbon\CarbonPeriod::create($nextMonthStart, $nextMonthEnd);


		$dates = [];
		//期間を取得
		$period = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth());
		$nextperiod = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->addMonth()->startOfMonth(), \Carbon\Carbon::now()->addMonth()->endOfMonth());

		// $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
		// $weekMap = [0, 1, 2, 3, 4, 5, 6];

		$weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
		$weekMap = [0, 1, 2, 3, 4, 5, 6];

		foreach ($period as $date) {
			$dates[] = $date->format('Y-m-d');
		}
		foreach ($nextperiod as $nextdate) {
			$nextdates[] = $nextdate->format('Y-m-d');
		}

		return view('staff_edit', compact('staff', 'available_dates', 'startDate', 'endDate', 'dates', 'period', 'weekDays', 'weekMap', 'thismonth', 'nextdates', 'nextmonth'));
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
