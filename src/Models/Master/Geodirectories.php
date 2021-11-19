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
// ------------------------------------------------------------------------
namespace Neo\Core\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Neo\Contracts\Sortable;
use Neo\Libraries\SortableTrait;
use Neo\Libraries\Stamps\HasUserStamps;

class Geodirectories extends Model implements Sortable
{
    use HasUserStamps;
    use SoftDeletes;
    use NodeTrait;
    use SortableTrait;

    protected $table = 'tm_geodirectories';
    protected $guarded = ['id'];

    /**
     * @var array
     */
    public $sortable = [
        'record_ordering_name' => 'record_ordering',
        'sort_when_creating' => true,
    ];



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
