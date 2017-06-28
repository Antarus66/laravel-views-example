<?php

namespace App\Http\Controllers;

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
            'photo' => 'http://www.jamisbikes.com/usa/assets/16_komodocomp.jpg',
            'in_stock' => true
        ], [
            'id' => 2,
            'model' => 'Jamis Comodo Sport',
            'description' => 'A 27.5x3” tire measures out to a 29” diameter and a 26x3” tire measures out to a '
                . '27.5” diameter. Combining them with a 40mm rim, results in the ultimate combination of tract'
                . 'ion, roll-over and versatility without being too heavy, too bouncy, too tall or feeling leth'
                . 'argic on the trail.',
            'photo' => 'http://www.jamisbikes.com/usa/assets/17_komodo26-sport.jpg',
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('examples/bikes/index', ['bikes' => $this->bikes->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('examples/bikes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['model', 'description', 'photo', 'in_stock']);

        $lastIndex = $this->bikes->max('id');
        $data['id'] = $lastIndex + 1;

        $this->bikes->add($data);

        return view('examples/bikes/index', ['bikes' => $this->bikes->toArray()]);
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
            return view('examples/bikes/show', $bike);
        } else {
            return view('errors/404'); // todo: make 404 page
        }
    }
}
