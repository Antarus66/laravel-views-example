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
     * @return array Returns all the items.
     */
    public function getAll();

    /**
     * Returns an item by id.
     *
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function getById($id);

    /**
     * Adds an item.
     *
     * @param array $data A new item data.
     * @return array An updated items array.
     */
    public function addItem($data);
}