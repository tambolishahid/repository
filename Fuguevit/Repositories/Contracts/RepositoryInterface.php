<?php

namespace Fuguevit\Repositories\Contracts;

interface RepositoryInterface
{
    /**
     * Fetch all items
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));

    /**
     * Fetch all items by value of specified field
     *
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function allBy($field, $value, $columns = array('*'));

    /**
     * Create an item
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Delete an item
     *
     * @param $id
     * @return boolean
     */
    public function delete($id);

    /**
     * Fetch an item by id
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'));

    /**
     * Fetch an item by value of specified field
     *
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($field, $value, $columns = array('*'));

    /**
     * Fetch items by where clause
     * @param $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere($where, $columns = array('*'));

    /**
     * Paginate items
     *
     * @param $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = array('*'));

    /**
     * @param array $data
     * @return bool
     */
    public function saveModel(array $data);

    /**
     * Update item
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

}