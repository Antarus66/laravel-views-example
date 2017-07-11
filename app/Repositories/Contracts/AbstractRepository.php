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
    public function getAll() : array
    {
        if ($this->itemsCollection->isEmpty()) {
            throw new NotFoundException('the collection is empty');
        }

        return $this->itemsCollection->toArray();
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id) : array
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
    public function addItem(array $data) : array
    {
        $lastIndex = $this->itemsCollection->max('id');
        $data['id'] = $lastIndex + 1;
        $this->itemsCollection->push($data);

        return $this->itemsCollection->toArray();
    }

    /**
     * @inheritdoc
     */
    public function update(int $id, array $data) : array
    {
        if ($this->itemsCollection->where('id', $id)->empty()) {
            throw new NotFoundException("No item #$id");
        }

        $this->itemsCollection = $this->itemsCollection->map(function ($item, $key) use ($id, $data) {
            if ($item['id'] == $id) {
                $item = $data;
                return $item;
            }

            return $item;
        });

        return $this->itemsCollection->toArray();
    }

    /**
     * @inheritdoc
     */
    public function delete(int $id) : array
    {
        $this->itemsCollection = $this->itemsCollection->whereNotIn('id', $id);
        return $this->itemsCollection->toArray();
    }
}