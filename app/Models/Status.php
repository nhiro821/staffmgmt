<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	// You can specify the table if it's not plural form of model name
	// protected $table = 'status';

	protected $fillable = ['arrangement_status'];
}
