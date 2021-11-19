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
 * Neo\Models\Wishlist
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $author_type
 * @property int $author_id
 * @property string $item_type
 * @property int $item_id
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wishlist whereUpdatedBy($value)
 */
class Wishlist extends Model
{
    use HasFactory;
}
