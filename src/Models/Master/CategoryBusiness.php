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
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Neo\Contracts\Sortable;
use Neo\Libraries\SortableTrait;
use Neo\Libraries\Stamps\HasUserStamps;

/**
 * Neo\Models\Master\CategoryBusiness
 *
 * @property int $id
 * @property string $title
 * @property int $record_left
 * @property int $record_right
 * @property int $record_dept
 * @property int $record_ordering
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|CategoryBusiness[] $children
 * @property-read int|null $children_count
 * @property-read \Neo\Models\System\User|null $creator
 * @property-read \Neo\Models\System\User|null $destroyer
 * @property-read \Neo\Models\System\User|null $editor
 * @property-read CategoryBusiness|null $parent
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness newQuery()
 * @method static \Illuminate\Database\Query\Builder|CategoryBusiness onlyTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness ordered(string $direction = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereCreatedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereDeletedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereDeletedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereRecordDept($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereRecordLeft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereRecordOrdering($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereRecordRight($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereTitle($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereUpdatedBy($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness withDepth(string $as = 'depth')
 * @method static \Illuminate\Database\Query\Builder|CategoryBusiness withTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|CategoryBusiness withoutTrashed()
 * @mixin \Eloquent
 * @property int $_lft
 * @property int $_rgt
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|CategoryBusiness whereRgt($value)
 */
class CategoryBusiness extends Model implements Sortable
{
    use HasUserStamps;
    use SoftDeletes;
    use NodeTrait;
    use SortableTrait;

    protected $table = 'tm_categories_business';
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
}
