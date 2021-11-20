<?php
/**
 * This file is part of the NEO ERP Application.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

// ------------------------------------------------------------------------
namespace Neo\Core\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Neo\Core\Models\Master\Geodirectories;

class GeodirectoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Geodirectories::truncate();
        $this->countries();
        $this->provinces();
        $this->cities();
        $this->districts();
        $this->villages();

//        Geodirectories::unguard();

//        $this->command->info('Geodirectories  table seeded!');
//
//        $path = __DIR__ . '/../data/tm_geodirectories.sql';
//        DB::unprepared(file_get_contents($path));
//        $this->command->info('Geodirectories table seeded!');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function countries()
    {
        $file = __DIR__ . '/../data/countries.json';
        $data = json_decode(file_get_contents($file), true);
        $countries = array_map(function ($country) {
            return [
                'name' => $country['name'],
                'type' => 'COUNTRY',
            ];
        }, $data);


        foreach ($countries as $country) {
            Geodirectories::create($country);
        }
    }

    public function provinces()
    {
        $file = __DIR__. './../data/provinces.csv';


        $header = ['id', 'name'];
        $data = csv_to_array($file, $header);
        $provinces = array_map(function ($arr) {
            return [
                'parent_id' => 104,
                'name' => Str::title($arr['name']),
                'code' => $arr['id'],
                'type' => 'PROVINCE'
            ];
        }, $data);

        foreach ($provinces as $province) {
            Geodirectories::create($province);
        }
    }

    public function cities()
    {
        $file = __DIR__ . './../data/regencies.csv';


        $header = ['id', 'province_id', 'name'];
        $data = csv_to_array($file, $header);
        $cities = array_map(function ($arr) {
            $type = strpos($arr['name'], 'KAB') == 'KAB' ? 'REGENCY' : 'CITY';
            $province = Geodirectories::where('code', $arr['province_id'])->firstOrFail();
            return [
                'name' => Str::title($arr['name']),
                'parent_id' => $province->id,
                'code' => $arr['id'],
                'type' => $type,
            ];
        }, $data);

        foreach ($cities as $city) {
            Geodirectories::create($city);
        }
    }

    public function districts()
    {
        $file = __DIR__. './../data/districts.csv';


        $header = ['id', 'regency_id', 'name'];
        $data = csv_to_array($file, $header);
        $districts = array_map(function ($arr) {
            $city = Geodirectories::where('code', $arr['regency_id'])->firstOrFail();
            return [
                'name' => Str::title($arr['name']),
                'parent_id' => $city->id,
                'code' => $arr['id'],
                'type' => 'DISTRICT',
            ];
        }, $data);

        foreach ($districts as $district) {
            Geodirectories::create($district);
        }
    }

    public function villages()
    {
        $file = __DIR__. './../data/villages.csv';


        $header = ['id', 'district_id', 'name'];
        $data = csv_to_array($file, $header);
        $villages = array_map(function ($arr) {
            $district = Geodirectories::where('code', $arr['district_id'])->firstOrFail();
            return [
                'name' => Str::title($arr['name']),
                'parent_id' => $district->id,
                'code' => $arr['id'],
                'type' => 'VILLAGE',
            ];
        }, $data);

        foreach ($villages as $village) {
            Geodirectories::create($village);
        }
    }
}
