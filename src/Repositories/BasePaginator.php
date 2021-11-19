<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @modified    4/9/21, 12:55 AM
 * @author         Nur Wachid
 * @copyright      Copyright (c) 2021.
 */

namespace Neo\Core\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class BasePaginator
{
    /**
     * @param LengthAwarePaginator $paginator
     * @param TransformerAbstract $transformer
     * @param $resourceKey
     * @return mixed
     */
    public function paginate(LengthAwarePaginator $paginator, TransformerAbstract $transformer, $resourceKey)
    {
        $collection = $paginator->getCollection();
        $resource = new Collection($collection, $transformer, $resourceKey);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $resource;
    }
}
