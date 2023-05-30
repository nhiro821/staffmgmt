<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function (Blueprint $table) {
			$table->id();
			$table->string('staff_name');
			$table->string('staff_kana');
			$table->string('staff_mobilephone');
			$table->string('staff_telephone');
			$table->string('staff_postcode');
			$table->string('staff_prefecture');
			$table->string('staff_address');
			$table->date('staff_registration_date');
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
		Schema::dropIfExists('staff');
	}
}
