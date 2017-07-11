<?php

namespace App\Entities;

use App\Entities\Contracts\Vehicle;
use App\Entities\Contracts\VehicleInterface;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Bicycle
 * @package App\Entities
 */
class Bicycle extends Vehicle implements VehicleInterface, Arrayable
{}