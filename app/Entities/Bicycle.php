<?php

namespace App\Entities;

use App\Entities\Contracts\Vehicle;
use App\Entities\Contracts\VehicleInterface;
use Illuminate\Contracts\Support\Arrayable;

class Bicycle extends Vehicle implements VehicleInterface, Arrayable
{}