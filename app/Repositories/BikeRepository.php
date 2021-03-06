<?php

namespace App\Repositories;

use App\Entities\Bicycle;
use App\Repositories\Contracts\AbstractRepository;
use App\Repositories\Contracts\BikeRepositoryInterface;

/**
 * @inheritdoc
 */
class BikeRepository extends AbstractRepository implements BikeRepositoryInterface
{
    /**
     * @inheritdoc
     */
    protected static $itemsData = [
        [
            'id' => 1,
            'model' => 'Jamis Comodo Comp',
            'description' => 'The Komodo frame is 100% designed for 27.5” wheels and trail riding with Kinesis '
                . 'aluminum tubing, oversized rear stays with a 12 x 142 thru-axle hub and a tapered head tube '
                . 'to serve up strength and stiffness for better handling and steering.',
            'photo' => 'http://sportsline.com.ua/products_pictures/jamis-komodo--comp-2015.jpg',
            'in_stock' => true
        ], [
            'id' => 2,
            'model' => 'Jamis Comodo Sport',
            'description' => 'A 27.5x3” tire measures out to a 29” diameter and a 26x3” tire measures out to a '
                . '27.5” diameter. Combining them with a 40mm rim, results in the ultimate combination of tract'
                . 'ion, roll-over and versatility without being too heavy, too bouncy, too tall or feeling leth'
                . 'argic on the trail.',
            'photo' => 'http://www.bikesourceonline.com/images/library/zoom/jamis-komodo-27.5-sport-282514-1.jpg',
            'in_stock' => false
        ],
    ];

    /**
     * @inheritdoc
     */
    protected function createEntity(array $data) : Bicycle
    {
        return new Bicycle($data);
    }
}