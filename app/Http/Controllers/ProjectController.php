<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Staff;
use App\Models\Work;
use App\Models\Custmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class ProjectController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$projects = Project::all();

		return view('projects', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$custmers = Custmer::all();

		return view('projectform', compact('custmers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreProjectRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$form = $request->all();
		$project = new Project;
		$user_id = Auth::id();


		$project->project_name = $form['project_name'];
		$project->torihikisaki_id = $form['id'];
		$project->order_amount = $form['project_price'];
		$project->project_startday = $form['project_startday'];
		$project->project_endday = $form['project_endday'];
		//もしuser_idがあれば、user_idを入れる
		if ($user_id) {
			$project->creator = $user_id;
			$project->updater = $user_id;
		}
		$project->save();

		return redirect()->route('project.index')->with('flash_message', '登録が完了しました');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function show(Project $project)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Project $project)
	{
		//
	}
	public function workedit(Project $project, $id)
	{
		//
		// dd($id);
		$project = Project::find($id);
		$staffs = Staff::all();
		$works = Work::all();

		// dd($project);

		// $staffs = $staffs->sortBy('staff_number');
		// $works = $works->sortBy('work_number');
		// $staffs = $staffs->pluck('staff_name', 'staff_number');
		// $works = $works->pluck('work_name', 'work_number');
		// $staffs = $staffs->prepend('選択してください', '');
		// $works = $works->prepend('選択してください', '');

		return view('projectworks', compact('project', 'staffs', 'works'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateProjectRequest  $request
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateProjectRequest $request, Project $project)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Project $project)
	{
		//
	}
}
