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
use Neo\Libraries\Stamps\HasUserStamps;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Neo\Models\System\Tag
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @property string $slug
 * @property string|null $type
 * @property int $record_left
 * @property int $record_right
 * @property int $record_dept
 * @property int $record_ordering
 * @property int|null $parent_id
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereRecordDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereRecordLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereRecordOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereRecordRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedBy($value)
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 */
class Tag extends Model
{
    use HasFactory;
    use HasUserStamps;
    use HasSlug;

    protected $table = 'sys_tags';
    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
