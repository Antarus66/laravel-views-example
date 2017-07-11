<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatedBikeRequest;
use App\Repositories\Contracts\BikeRepositoryInterface;
use App\Repositories\Exceptions\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BikeController extends Controller
{
    private $bikesRepository;

    public function __construct(BikeRepositoryInterface $bikeRepository)
    {
        $this->bikesRepository = $bikeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bikes = $this->bikesRepository->getAll();

        return view('bikes/index', ['bikes' => $bikes]);
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
        $updatedCollection = $this->bikesRepository->addItem($data);

        return view('bikes/index', ['bikes' => $updatedCollection]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $bike = $this->bikesRepository->getById($id);
        } catch (NotFoundException $e) {
            return view('errors/404');
        }

        return view('bikes/show', $bike);
    }
}
