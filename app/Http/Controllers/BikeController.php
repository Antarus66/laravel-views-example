<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatedBikeRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BikeController extends Controller
{
    private $bikesData = [
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

    private $bikes;

    public function __construct()
    {
        $this->bikes = new Collection($this->bikesData);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('bikes/index', ['bikes' => $this->bikes->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('bikes/create');
    }

    public function createSimple()
    {
        return view('bikes/create-simple');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidatedBikeRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(ValidatedBikeRequest $request)
    {
        $data = $request->only(['model', 'description', 'photo', 'in_stock']);

        $lastIndex = $this->bikes->max('id');
        $data['id'] = $lastIndex + 1;

        $this->bikes->add($data);

        return view('bikes/index', ['bikes' => $this->bikes->toArray()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bike = $this->bikes->where('id', $id)->first();

        if ($bike) {
            return view('bikes/show', $bike);
        } else {
            return view('errors/404');
        }
    }
}
