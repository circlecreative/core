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
namespace Neo\Core\Models\Master;

use Illuminate\Database\Eloquent\Model;

/**
 * Neo\Models\Master\Currency
 *
 * @property int $id
 * @property int|null $priority
 * @property string|null $iso_code
 * @property string|null $name
 * @property string|null $symbol
 * @property string|null $disambiguate_symbol
 * @property array|null $alternate_symbols
 * @property string|null $subunit
 * @property int $subunit_to_unit
 * @property int $symbol_first
 * @property string|null $html_entity
 * @property string|null $decimal_mark
 * @property string|null $thousands_separator
 * @property string|null $iso_numeric
 * @property int $smallest_denomination
 * @property string|null $exchange_rate value of exchange rate from openexchange
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereAlternateSymbols($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDecimalMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDisambiguateSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereHtmlEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereIsoNumeric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSmallestDenomination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSubunit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSubunitToUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbolFirst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereThousandsSeparator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedBy($value)
 */
class Currency extends Model
{
    protected $table = 'tm_currencies';

    protected $guarded = ['id'];

    protected $casts = [
        'alternate_symbols' => 'array'
    ];
}
