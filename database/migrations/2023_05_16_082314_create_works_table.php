<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function (Blueprint $table) {
			$table->id();
			$table->string('worker');
			$table->string('custmer');
			$table->string('arrangement_status');
			$table->string('order_type');
			$table->string('reward');
			$table->string('work_prefecture');
			$table->string('work_address');
			$table->date('working_date');
			$table->date('working_start_plan_time');
			$table->date('working_end_plan_time');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('works');
	}
}
