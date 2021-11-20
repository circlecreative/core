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

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TimeZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = __DIR__ . '/../data/timezones.json';
        $data = json_decode(file_get_contents($file), true);

        $timezones = array_map(function ($color) {
            return [
                'value' => $color['value'],
                'abbr' => $color['abbr'],
                'offset' => $color['offset'],
                'isdst' => $color['isdst'],
                'text' => $color['text'],
                'utc' => $color['utc'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
        }, $data);

        app('db')->table('tm_timezones')->insert($timezones);
    }
}
