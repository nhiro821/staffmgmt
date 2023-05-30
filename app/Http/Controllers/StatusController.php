<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
	public function updateStatus(Request $request)
	{
		$arrangement_status = $request->input('arrangement_status');
		dd($arrangement_status);

		// Find the record you want to update, here I'm using the first record as an example
		$status = Status::first();

		// Update the record
		$status->arrangement_status = $arrangement_status;
		$status->save();

		return response()->json(['message' => 'Status updated successfully']);
	}
}
