<?php

namespace App\Models;

use App\Http\Controllers\CustmerController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	use HasFactory;
	protected $fillable = [
		'id',
		// 他のフィールド
	];

	public function staff()
	{
		return $this->hasOne(Staff::class, 'id', 'worker');
	}
	public function custmerget()
	{
		return $this->hasOne(Custmer::class, 'id', 'custmer');
	}
	public function projectget()
	{
		return $this->hasOne(Project::class, 'id', 'project_id');
	}
}
