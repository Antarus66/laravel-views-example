<?php

namespace App\Repositories;

use App\Repositories\Contracts\AbstractRepository;
use App\Repositories\Contracts\RepositoryInterface;

class BikeRepository extends AbstractRepository implements RepositoryInterface
{
    protected $itemsData = [
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
            'photo' => 'http://www.greenmountainbikes.com/wp-content/uploads/2017/05/5908f383ba95e.jpg',
            'in_stock' => false
        ],
    ];
}