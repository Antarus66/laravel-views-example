<?php

namespace App\Repositories\Contracts;

use App\Repositories\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

/**
 * Class AbstractRepository
 * @package App\Repositories\Contracts
 */
class AbstractRepository implements RepositoryInterface
{
    /**
     * @var array Raw mock data.
     */
    protected $itemsData;

    /**
     * @var Collection Wrapped data to handy work with.
     */
    protected $itemsCollection;

    public function __construct()
    {
        $this->itemsCollection = new Collection($this->itemsData);
    }

    /**
     * @inheritdoc
     */
    public function getAll()
    {
        return $this->itemsCollection->toArray();
    }

    /**
     * @inheritdoc
     */
    public function getById($id)
    {
        $item = $this->itemsCollection->where('id', $id)->first();

        if (!$item) {
            throw new NotFoundException("No item #$id");
        }

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function addItem($data)
    {
        $lastIndex = $this->itemsCollection->max('id');
        $data['id'] = $lastIndex + 1;
        $this->itemsCollection->push($data);

        return $this->itemsCollection->toArray();
    }
}