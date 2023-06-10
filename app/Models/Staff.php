<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	use HasFactory;

	public function availableDates()
	{
		return $this->hasMany(AvailableDate::class);
	}
}
