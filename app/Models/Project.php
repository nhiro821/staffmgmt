<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use HasFactory;
	public function custmeron()
	{
		return $this->hasOne(Custmer::class, 'id', 'torihikisaki_id');
	}
	public function works()
	{
		return $this->hasMany('App\Models\Work');
	}
}
