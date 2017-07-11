<?php

namespace App\Entities\Contracts;

use App\Entities\Contracts\VehicleInterface;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Vehicle
 * @package App\Entities\Contracts
 */
abstract class Vehicle implements VehicleInterface, Arrayable
{
    protected $id;
    protected $model;
    protected $description;
    protected $price;
    protected $photo;
    protected $inStock;

    public function __construct(array $data = null)
    {
        return $this->fromArray($data);
    }

    /**
     * @var array Field which can be filled with the fromArray function.
     */
    private $fillable = ['id', 'model', 'description', 'price', 'photo', 'inStock'];

    /**
     * Fills the entity with data.
     *
     * @param array $data
     * @return \App\Entities\Contracts\VehicleInterface
     */
    public function fromArray(array $data) : VehicleInterface
    {
        if (empty($this->fillable)) {
            return $this;
        }

        foreach ($this->fillable as $field) {
            if (array_has($data, $field)) {
                $this->$field = $data[$field];
            } else if (array_has($data, snake_case($field))) {
                $this->$field = $data[snake_case($field)];
            }
        }

        return $this;
    }

    /**
     * Formats the entity to array.
     *
     * @return array
     */
    public function toArray() : array
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'description' => $this->description,
            'price' => $this->price,
            'photo' => $this->photo,
            'in_stock' => $this->inStock,
        ];
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     * @return Vehicle
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }
}