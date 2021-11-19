<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @modified    2/18/21, 7:01 PM
 * @author         Nur Wachid
 * @copyright      Copyright (c) 2021.
 */

namespace Neo\Core\Contracts;

interface BaseRepositoryInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param array $attributes
     * @return bool
     */
    public function update(array $attributes) : bool;

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all(array $columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc');

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     */
    public function findOneOrFail($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneByOrFail(array $data);

    /**
     * @return bool
     */
    public function delete() : bool;

    /**
     * @return mixed
     */
    public function trashOnly();

    /**
     * @param $id
     * @return mixed
     */
    public function findTrash($id);

    /**
     * @param $limit
     * @return mixed
     */
    public function recent($limit);

    /**
     * @param $id
     * @return mixed
     */
    public function trash($id);

    /**
     * @param $id
     * @return mixed
     */
    public function restore($id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param $ids
     * @return mixed
     */
    public function massTrash($ids);

    /**
     * @param $ids
     * @return mixed
     */
    public function massRestore($ids);

    /**
     * @param $ids
     * @return mixed
     */
    public function massDestroy($ids);

    /**
     * @return mixed
     */
    public function emptyTrash();
}
