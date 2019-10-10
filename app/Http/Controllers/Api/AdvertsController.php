<?php

namespace App\Http\Controllers\Api;

use App\Models\Advert;
use App\Http\Resources\AdvertCollection;
use App\Http\Resources\Advert as AdvertResource;
use App\Models\AdvertStatus;
use Illuminate\Http\Request;

class AdvertsController extends BaseController
{
    protected $adverts;

    public function __construct(AdvertRepository $adverts)
    {
        $this->adverts = $adverts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('status_id', AdvertStatus::ACTIVE)->paginate(5);
//        return response()->json($this->adverts->getForShowActiveAdvertsPaginatedList(6));

        return new AdvertCollection($adverts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adverts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advert = Advert::firstOrCreate($request->all());
        if(!$advert){
            return response()->json([],403);
        }
        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::find($id);

        if(!$advert){
            return response()->json([],404);
        }

        return response()->json(new AdvertResource($advert, 200));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        //
    }
}
