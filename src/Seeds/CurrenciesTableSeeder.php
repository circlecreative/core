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
use Neo\Models\Master\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = __DIR__ . '/../data/currencies.json';

        $data = json_decode(file_get_contents($file), true);
        $currencies = array_map(function ($currency) {
            return [
                'priority' => $currency['priority'] ?? 100,
                'iso_code' => $currency['iso_code'] ?? null,
                'name' => $currency['name'] ?? null,
                'symbol' => $currency['symbol'] ?? null,
                'disambiguate_symbol' => $currency['disambiguate_symbol'] ?? null,
                'alternate_symbols' =>  $currency['alternate_symbols'] ?? null,
                'subunit' => $currency['subunit'] ?? null,
                'subunit_to_unit' => $currency['subunit_to_unit'] ?? 100,
                'symbol_first' => $currency['symbol_first'] ?? 1,
                'html_entity' => $currency['html_entity'] ?? null,
                'decimal_mark' => $currency['decimal_mark'] ?? '.',
                'thousands_separator' => $currency['thousands_separator'] ?? ',',
                'iso_numeric' => $currency['iso_numeric'] ?? null,
                'smallest_denomination' => $currency['smallest_denomination'] ?? 1,

            ];
        }, $data);

        \Schema::disableForeignKeyConstraints();
        Currency::truncate();
        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
