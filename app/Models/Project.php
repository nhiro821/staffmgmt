<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Kyslik\ColumnSortable\Sortable; //追記


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

	// public $sortable = ['project_name', 'torihikisaki_id', 'updated_at']; //追記(ソートに使うカラムを指定


	protected $table = 'projects';
	//
	// 「１対１」→ メソッド名は単数形
	public function custmers()
	{
		return $this->belongsTo('App\Custmer');
	}
}
