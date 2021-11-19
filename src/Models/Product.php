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

namespace Neo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Neo\Models\Product
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $post_id
 * @property int $brand_id
 * @property string $sku
 * @property string $barcode
 * @property string $preorder
 * @property string $condition
 * @property string $deliverable
 * @property string $downloadable
 * @property string $target_gender
 * @property string $target_ages
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeliverable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDownloadable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePreorder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTargetAges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTargetGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedBy($value)
 * @property string $target_age
 * @property int $record_left
 * @property int $record_right
 * @property int $record_dept
 * @property int $record_ordering
 * @property int|null $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRecordDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRecordLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRecordOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRecordRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTargetAge($value)
 */
class Product extends Model
{
    use HasFactory;
}
