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

use Neo\Core\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\Cursor;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection as FractalCollection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Item as FractalItem;
use League\Fractal\Scope;
use League\Fractal\TransformerAbstract;

/**
 * Class BaseRepository.
 * @package Neo\Repositories
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;
    /**
     * @var BaseManager
     */
    protected $manager;

    /**
     * @var BasePaginator
     */
    protected $paginator;

    /**
     * @var Builder
     */
    protected $query;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->manager = new BaseManager;
        $this->paginator = new BasePaginator;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) : bool
    {
        return $this->model->update($data);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all(array $columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param  $id
     * @throws ModelNotFoundException
     * @return mixed
     */
    public function findOneOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return Collection
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    /**
     * @param array $data
     * @throws ModelNotFoundException
     * @return mixed
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @throws \Exception
     * @return bool
     */
    public function delete() : bool
    {
        return $this->model->delete();
    }

    /**
     * @return mixed
     */
    public function trashOnly()
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findTrash($id)
    {
        return $this->model->onlyTrashed()->findOrFail($id);
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function recent($limit)
    {
        return $this->model->take($limit)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function trash($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restore($id)
    {
        return $this->model->onlyTrashed()->findOrFail($id)->restore();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->onlyTrashed()->findOrFail($id)->forceDelete();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function massTrash($ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function massRestore($ids)
    {
        return $this->model->onlyTrashed()->whereIn('id', $ids)->restore();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function massDestroy($ids)
    {
        return $this->model->withTrashed()->whereIn('id', $ids)->forceDelete();
    }

    /**
     * @return mixed
     */
    public function emptyTrash()
    {
        return $this->model->onlyTrashed()->forceDelete();
    }

    /**
     * Paginate arrays.
     *
     * @param array $data
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginateArrayResults(array $data, int $perPage = 50)
    {
        $page = Request::get('page', 1);
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_values(array_slice($data, $offset, $perPage, true)),
            count($data),
            $perPage,
            $page,
            [
                'path' => app('request')->url(),
                'query' => app('request')->query(),
            ]
        );
    }

    /**
     * @param Model $model
     * @param TransformerAbstract $transformer
     * @param string $resourceKey
     * @param string $includes
     * @return Scope
     *
     * @deprecated use @transformItem
     */
    public function processItemTransformer(
        Model $model,
        TransformerAbstract $transformer,
        string $resourceKey,
        string $includes = null
    ) : Scope {
        $manager = new ItemAndCollectionManager(new Manager);
        $item = new FractalItem($model, $transformer, $resourceKey);

        $included = explode(',', $includes);

        return $manager->createItemData(
            $item,
            $included
        );
    }

    /**
     * @param Collection $collection
     * @param TransformerAbstract $transformer
     * @param string $resourceKey
     * @param string $includes
     * @param int $perPage
     * @return Scope
     *
     * @deprecated use @transformCollection
     */
    public function processCollectionTransformer(
        Collection $collection,
        TransformerAbstract $transformer,
        string $resourceKey,
        string $includes = null,
        $perPage = 25
    ) : Scope {
        $manager = new ItemAndCollectionManager(new Manager);

        $page = app('request')->input('page', 1);
        $fractalCollection = new FractalCollection($collection->forPage($page, $perPage), $transformer, $resourceKey);

        $paginator = $this->paginateArrayResults($collection->all(), $perPage);
        $queryParams = array_diff_key($_GET, array_flip(['page']));
        $paginator->appends($queryParams);
        $fractalCollection->setPaginator(new IlluminatePaginatorAdapter($paginator));

        if (! is_null($includes)) {
            $included = explode(',', $includes);

            return $manager->createCollectionData(
                $fractalCollection,
                $included
            );
        } else {
            return $manager->createCollectionData(
                $fractalCollection
            );
        }
    }

    /**
     * Transform a Paginated response.
     *
     * @param LengthAwarePaginator $paginator
     * @param TransformerAbstract $transformer
     * @param string $resourceKey
     * @param string $includes
     * @return Scope
     */
    public function processPaginatedResults(
        LengthAwarePaginator $paginator,
        TransformerAbstract $transformer,
        string $resourceKey,
        string $includes = null
    ) : Scope {
        $items = $paginator->getCollection();

        $resource = new FractalCollection($items, $transformer, $resourceKey);
        $fractalCollection = $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));

        $manager = new ItemAndCollectionManager(new Manager);

        if (! is_null($includes)) {
            $included = explode(',', $includes);

            return $manager->createCollectionData(
                $fractalCollection,
                $included
            );
        } else {
            return $manager->createCollectionData(
                $fractalCollection
            );
        }
    }

    /**
     * Transform a Model.
     *
     * @param Model $model
     * @param TransformerAbstract $transformer
     * @param $resourceKey
     * @param array $includes
     * @return array
     */
    public function transformItem(
        Model $model,
        TransformerAbstract $transformer,
        $resourceKey,
        array $includes = []
    ) : array {
        $resource = new Item($model, $transformer, $resourceKey);

        return $this->manager->buildData($resource, $includes);
    }

    /**
     * Transform a Model Collection.
     *
     * @param $collection
     * @param TransformerAbstract $transformer
     * @param $resourceKey
     * @param array $includes
     * @return array
     */
    public function transformCollection(
        $collection,
        TransformerAbstract $transformer,
        $resourceKey,
        array $includes = []
    ) : array {
        $resource = new FractalCollection($collection, $transformer, $resourceKey);

        return $this->manager->buildData($resource, $includes);
    }

    /**
     * Create custom build query.
     *
     * @param Model|Builder $modelOrBuilder
     * @param array $params
     * @return Builder
     */
    public function queryBy($modelOrBuilder, array $params) : Builder
    {
        $start = $modelOrBuilder;
        if (! empty($params)) {
            $start->where($params);
        }

        $this->query = $start;

        return $this->query;
    }

    /**
     * @param Builder $builder
     * @param TransformerAbstract $transformer
     * @param bool $isPaginated
     * @param int $limit
     *
     *
     * @param null $offset
     * @param null $previous
     *
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getData(
        Builder $builder,
        TransformerAbstract $transformer,
        $isPaginated = true,
        $limit = 50,
        $offset = null,
        $previous = null
    ) {
        if (! $isPaginated) {
            return $builder->get();
        }

        if ($offset) {
            $collection = $builder->offset($offset)->take($limit)->get();
        } else {
            $collection = $builder->take($limit)->get();
        }

        $newCursor = $collection->last()->id;
        $cursor = new Cursor($offset, $previous, $newCursor, $collection->count());

        $resource = new FractalCollection($collection, $transformer);
        $resource->setCursor($cursor);

        $manager = new Manager;

        return $manager->createData($resource)->toArray();
    }
}
