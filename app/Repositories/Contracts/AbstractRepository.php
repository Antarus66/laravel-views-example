<?php

namespace App\Repositories\Contracts;

use App\Repositories\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AbstractRepository
 * @package App\Repositories\Contracts
 */
abstract class AbstractRepository implements RepositoryInterface
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
        $this->itemsCollection = new Collection();

        foreach ($this->itemsData as $data) {
            $item = $this->createEntity($data);
            $this->itemsCollection->push($item);
        }
    }

    /**
     * Creates an entity of a repository type
     *
     * @param array $data
     * @return mixed
     */
    abstract protected function createEntity(array $data);

    /**
     * @inheritdoc
     */
    public function getAll() : Collection
    {
        return $this->itemsCollection->sortBy(function ($entity) {
            return $entity->getId();
        });
    }

    /**
     * @inheritdoc
     */
    public function getById(int $id)
    {
        $item = $this->itemsCollection->filter(function ($entity) use ($id) {
            return $entity->getId() === $id;
        })->first();

        if (!$item) {
            throw new NotFoundException("No item is found.");
        }

        return $item;
    }

    /**
     * @inheritdoc
     */
    public function addItem($entity) : Collection
    {
        $entity->setId($this->getNextIndex());
        $this->itemsCollection = $this->itemsCollection->push($entity);

        return $this->getAll();
    }

    /**
     * @inheritdoc
     */
    public function update($entity) : Collection
    {
        $id = $entity->getId();

        $notFound = $this->itemsCollection->filter(function ($entity) use ($id) {
            return $entity->getId() == $id;
        })->isEmpty();

        if ($notFound) {
            throw new NotFoundException("No item is found.");
        }

        $this->delete($id);
        $this->itemsCollection = $this->itemsCollection->push($entity);

        return $this->getAll();
    }

    /**
     * @inheritdoc
     */
    public function store($entity) : Collection
    {
        try {
            return $this->update($entity);
        } catch (NotFoundException $e) {
            return $this->addItem($entity);
        }
    }

    /**
     * @inheritdoc
     */
    public function delete(int $id) : Collection
    {
        $this->itemsCollection = $this->itemsCollection->filter(function ($entity) use ($id) {
            return $entity->getId() !== $id;
        });

        return $this->getAll();
    }

    /**
     * Calculates a new id.
     *
     * @return int
     */
    private function getNextIndex() : int
    {
        $i = 0;

        $this->itemsCollection->each(function ($entity) use (&$i) {
            if ($entity->getId() > $i) {
                $i = $entity->getId();
            }
        });

        return $i + 1;
    }
}