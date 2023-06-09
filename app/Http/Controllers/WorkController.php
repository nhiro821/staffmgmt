<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;
use App\Models\Work;
use App\Models\Custmer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;


class WorkController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$works = Work::all();

		$staff = Staff::all();
		$custmers = Custmer::all();
		// $arrangement_status = config('const.arrangement_status');
		// dd($arrangement_status);

		return view('works', compact('works', 'staff', 'custmers'));
	}
	public function index2(Request $request) // 未手配一覧
	{

		$staff = Staff::all();

		$custmers = Custmer::all();

		$requestdata = $request;
		$search = $requestdata['kensaku'];

		$projects = Project::with('works') // リレーションをロード
			->has('works') // postsテーブルに関連するデータがある場合のみ抽出
			->get();


		$works = Work::whereIn('arrangement_status', [0, 1])->get();


		$count = count($works);

		return view('works_arrange', compact('works', 'staff', 'custmers', 'search', 'count', 'projects'));
	}

	public function works_by_project(Request $request) // プロジェクト別
	{

		$staff = Staff::all();

		$custmers = Custmer::all();
		$requestdata = $request;
		$search = $requestdata['kensaku'];

		$projects = Project::with('works') // リレーションをロード
			->has('works') // postsテーブルに関連するデータがある場合のみ抽出
			->get();

		$works = Work::all(); //作業件数をすべて
		$work = Work::whereIn('arrangement_status', [0, 1])->get(); //未手配、手配中のみの作業件数
		$count_all = count($works); //作業件数をすべての数
		$count_non_arrange = count($work);


		return view('works_by_project', compact('works', 'count_all', 'staff', 'custmers', 'search', 'count_non_arrange', 'projects'));
	}
	public function updateStatus(Request $request) //未手配一覧
	{


		$data_id = $request->input('data_id');
		$arrangement_status = $request->input('arrangement_status');



		Log::debug($arrangement_status);

		$works	= Work::find($data_id);

		// Find the record you want to update, here I'm using the first record as an example

		// Update the record
		$works->arrangement_status = $arrangement_status;

		$works->save();
	}
	public function updateMemo(Request $request) //メモの更新
	{


		$data_id = $request->input('data_id');
		$memo = $request->input('new_comment');

		Log::debug($memo);

		$works	= Work::find($data_id);

		// Find the record you want to update, here I'm using the first record as an example

		// Update the record
		$works->memo = $memo;

		$works->save();
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
	public function edit(Staff $staff)
	{
		//
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
