<?php

namespace App\Repositories\Contracts;

use App\Repositories\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

class AbstractRepository implements RepositoryInterface
{
    protected $itemsData;

    protected $itemsCollection;

    public function __construct()
    {
        $this->itemsCollection = new Collection($this->itemsData);
    }

    public function getAll()
    {
        return $this->itemsCollection;
    }

    public function getById($id)
    {
        $item = $this->itemsCollection->where('id', $id)->first();

        if (!$item) {
            throw new NotFoundException("No item #$id");
        }

        return $item;
    }

    public function add($data)
    {
        $lastIndex = $this->itemsCollection->max('id');
        $data['id'] = $lastIndex + 1;
        $this->itemsCollection->add($data);

        return $this->itemsCollection;
    }
}