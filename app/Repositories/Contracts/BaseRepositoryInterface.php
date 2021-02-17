<?php

namespace App\Repositories\Contracts;

/**
 * Interface BaseRepositoryInterface.
 */
interface BaseRepositoryInterface
{
    /**
     * Retrieve all data of repository.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function getAll($columns = ['*']);
    /**
     * Retrieve getAll data paginate.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getAllAndPaginate($limit = 10, $params = []);
    /**
     * Retrieve all data clause.
     *
     * @param array $params
     *
     * @return mixed
     */
    public function getWhere($colomb, $value);
    /**
     * Find data by id.
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = ['*']);

    /**
     * Save a new entity in repository.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update a entity in repository by id.
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Delete a entity in repository by id.
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id);
    
}