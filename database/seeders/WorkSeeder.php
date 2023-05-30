<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Work;

class WorkSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		// 空の場合、テーブルをクリア
		DB::table('works')->truncate();

		// CSVファイルのパスを指定
		$csvFilePath = base_path('database/data/work_data.csv');

		// CSVファイルのデータを取得
		$csvFileData = File::get($csvFilePath);

		// CSVデータを配列に変換
		$csvData = array_map('str_getcsv', explode("\n", $csvFileData));

		// CSVデータのヘッダーを削除
		array_shift($csvData);

		// CSVデータをデータベースに挿入
		foreach ($csvData as $index => $data) {
			echo "データの問題が発生しました。行: " . ($index + 1) . "\n";
			print_r($data);
			if (!empty($data) && count($data) === 10) {
				DB::table('works')->insert([
					'worker' => $data[0],
					'custmer' => $data[1],
					'arrangement_status' => $data[2],
					'order_type' => $data[3],
					'reward' => $data[4],
					'work_prefecture' => $data[5],
					'work_address' => $data[6],
					'working_date' => date('Y-m-d', strtotime($data[7])),
					'working_start_plan_time' => date('H:i:s', strtotime($data[8])),
					'working_end_plan_time' => date('H:i:s', strtotime($data[9])),
					'created_at' => now(),
					'updated_at' => now(),
				]);
			} else {
			}
		}
	}
}
