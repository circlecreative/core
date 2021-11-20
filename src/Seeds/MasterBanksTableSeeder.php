<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         PT. Lingkar Kreasi (Circle Creative)
 *  @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */
// ------------------------------------------------------------------------
namespace Neo\Core\Seeds;

use Illuminate\Database\Seeder;

class MasterBanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = __DIR__.'/../data/banks.json';
        $data = json_decode(file_get_contents($file), true);
        $banks = array_map(function ($arr) {
            return [
                'name' => $arr['name'],
                'alias' => $arr['alias'],
                'company' => $arr['company'],
                'code' => $arr['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $data);

        app('db')->table('tm_banks')->insert($banks);
    }
}
