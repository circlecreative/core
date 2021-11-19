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
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Neo\Libraries\Media\HasMedia;
use Neo\Libraries\SortableTrait;
use Neo\Libraries\Stamps\HasUserStamps;

/**
 * Neo\Models\System\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property string $model_type
 * @property int $model_id
 * @property string $message
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\Neo\Models\System\Media[] $media
 * @property-read int|null $media_count
 * @property int $commentable_id
 * @property string $commentable_type
 * @property int $commenter_id
 * @property string $commenter_type
 * @property int $record_left
 * @property int $record_right
 * @property int $record_dept
 * @property int $record_ordering
 * @property int|null $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommenterType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRecordDept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRecordLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRecordOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereRecordRight($value)
 * @property-read \Kalnoy\Nestedset\Collection|Comment[] $children
 * @property-read int|null $children_count
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 * @property-read Comment|null $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment ordered(string $direction = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Comment withoutRoot()
 */
class Comment extends Model
{
    use HasUserStamps;
    use NodeTrait;
    use SortableTrait;
    use HasFactory;
    use HasMedia;

    protected $table = 'sys_comments';


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
}
