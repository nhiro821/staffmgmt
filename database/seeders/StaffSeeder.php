<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Staff;




class StaffSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// 空の場合、テーブルをクリア
		DB::table('staff')->truncate();

		// CSVファイルのパスを指定
		$csvFilePath = base_path('database/data/staff_data.csv');

		// CSVファイルのデータを取得
		$csvFileData = File::get($csvFilePath);

		// CSVデータを配列に変換
		$csvData = array_map('str_getcsv', explode("\n", $csvFileData));

		// CSVデータのヘッダーを削除
		array_shift($csvData);

		// CSVデータをデータベースに挿入
		foreach ($csvData as $data) {
			if (!empty($data) && count($data) === 8) {
				DB::table('staff')->insert([
					'staff_name' => $data[0],
					'staff_kana' => $data[1],
					'staff_mobilephone' => $data[2],
					'staff_telephone' => $data[3],
					'staff_postcode' => $data[4],
					'staff_prefecture' => $data[5],
					'staff_address' => $data[6],
					'staff_registration_date' => date('Y-m-d', strtotime($data[7])),
					'created_at' => now(),
					'updated_at' => now(),
				]);
			}
		}
	}
}
