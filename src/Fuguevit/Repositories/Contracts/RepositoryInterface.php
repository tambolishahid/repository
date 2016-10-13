<?php

namespace Fuguevit\Repositories\Contracts;

/**
 * Interface RepositoryInterface
 *
 * @package Fuguevit\Repositories\Contracts
 */
interface RepositoryInterface
{
    /**
     * Fetch all items.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Create an item.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * Delete an item.
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id);

    /**
     * Fetch an item by id.
     *
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Fetch an item by value of specified field.
     *
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findBy($field, $value, $columns = ['*']);

    /**
     * Find data by multiple fields in one field.
     *
     * @param $field
     * @param array $values
     * @param array $columns
     * @return mixed
     */
    public function findIn($field, array $values, $columns = ['*']);

    /**
     * Find data exclude multiple fields in on field.
     *
     * @param $field
     * @param array $values
     * @param array $columns
     * @return mixed
     */
    public function findNotIn($field, array $values, $columns = ['*']);

    /**
     * Fetch items by where clause.
     *
     * @param $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere($where, $columns = ['*']);

    /**
     * Paginate items.
     *
     * @param $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = ['*']);

    /**
     * @param array $data
     *
     * @return bool
     */
    public function saveModel(array $data);

    /**
     * Update item.
     *
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $field
     * @param string $direction
     * @return mixed
     */
    public function orderBy($field, $direction = 'asc');
}
