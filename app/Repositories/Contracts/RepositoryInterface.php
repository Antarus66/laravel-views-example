<?php

namespace App\Repositories\Contracts;

use App\Repositories\Exceptions\NotFoundException;

/**
 * Interface RepositoryInterface
 * @package App\Repositories\Contracts
 */
interface RepositoryInterface
{
    /**
     * @return array
     * @throws NotFoundException
     */
    public function getAll() : array;

    /**
     * Returns an item by id.
     *
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function getById(int $id) : array;

    /**
     * Adds an item.
     *
     * @param array $data A new item data.
     * @return array An updated items array.
     */
    public function addItem(array $data) : array;

    /**
     * Updates an item by id with data.
     *
     * @param int $id
     * @param array $data Edited item data.
     * @return array An updated collection
     */
    public function update(int $id, array $data) : array;

    /**
     * Removes an item by id.
     *
     * @param $id
     * @return array An updated collection
     */
    public function delete(int $id) : array;
}