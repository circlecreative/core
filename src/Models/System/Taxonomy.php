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
use Kalnoy\Nestedset\NodeTrait;
use Neo\Contracts\Sortable;
use Neo\Libraries\Media\HasMedia;
use Neo\Libraries\SortableTrait;
use Neo\Libraries\Stamps\HasUserStamps;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Neo\Models\System\Taxonomy
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $code
 * @property string|null $description
 * @property int $record_left
 * @property int $record_right
 * @property int $record_ordering
 * @property int $parent_id
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|Taxonomy[] $children
 * @property-read int|null $children_count
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 * @property-read \Illuminate\Database\Eloquent\Collection|\Neo\Models\System\Media[] $media
 * @property-read int|null $media_count
 * @property-read Taxonomy $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy ordered(string $direction = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereCode($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereCreatedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereDeletedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereDeletedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereDescription($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereRecordLeft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereRecordOrdering($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereRecordRight($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereSlug($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy whereUpdatedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Taxonomy withoutRoot()
 * @mixin \Eloquent
 */
class Taxonomy extends Model implements Sortable
{
    use HasUserStamps;
    use HasSlug;
    use NodeTrait;
    use SortableTrait;
    use HasFactory;
    use HasMedia;

    protected $table = 'sys_taxonomies';
    protected $guarded = ['id'];

    /**
    * @return string
    */
    public function getLftName()
    {
        return 'record_left';
    }

    /**
     * @return string
     */
    public function getRgtName()
    {
        return 'record_right';
    }

    /**
     * @return string
     */
    public function getParentIdName()
    {
        return 'parent_id';
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
