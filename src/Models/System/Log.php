<?php
/*
 * This file is part of the NEO ERP Application.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         PT. Lingkar Kreasi (Circle Creative)
 * @copyright      Copyright (c) PT. Lingkar Kreasi (Circle Creative)
 */

namespace Neo\Core\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Neo\Models\System\Log
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $event
 * @property string $description
 * @property string|null $model_type
 * @property int|null $model_id
 * @property string|null $properties
 * @property int $record_left
 * @property int $record_right
 * @property int $record_dept
 * @property int $record_ordering
 * @property int|null $parent_id
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereRecordDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereRecordLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereRecordOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereRecordRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUuid($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
    use HasFactory;

    protected $table = 'sys_logs';
}
