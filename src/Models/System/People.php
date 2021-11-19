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
 * Neo\Models\System\People
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $personal
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|People newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People query()
 * @method static \Illuminate\Database\Eloquent\Builder|People whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People wherePersonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUserId($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PeopleFactory factory(...$parameters)
 */
class People extends Model
{
    use HasFactory;

    protected $table = 'sys_people';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new \Database\Factories\PeopleFactory();
    }
}
