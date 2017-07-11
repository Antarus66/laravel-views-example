<?php

namespace App\Entities\Contracts;

use App\Entities\Contracts\VehicleInterface;
use Illuminate\Contracts\Support\Arrayable;

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

    private $fillable = ['id', 'model', 'description', 'price', 'photo', 'inStock'];

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

    public function getId() : int
    {
        return (int) $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }
}