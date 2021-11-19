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
 * Neo\Models\Master\Timezone
 *
 * @property int $id
 * @property string|null $value
 * @property string|null $abbr
 * @property int|null $offset
 * @property int|null $isdst
 * @property string|null $text
 * @property string|null $utc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereIsdst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereOffset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereUtc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereValue($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Timezone whereUpdatedBy($value)
 */
class Timezone extends Model
{
    protected $table = 'tm_timezones';
    protected $guarded = ['id'];
}
