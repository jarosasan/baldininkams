<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Repositories\AdvertRepository;
use Illuminate\Http\Request;
use App\Servises\AdvertService;

class AdvertsController extends BaseController
{
    protected $adverts;
    protected $advertService;

    public function __construct(AdvertRepository $adverts, AdvertService $advertService)
    {
        $this->adverts = $adverts;
        $this->advertService = $advertService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paginate = 3)
    {
        $adverts = $this->advertService->returnListOfAdverts($paginate);

        return view('adverts.adverts_list', compact('adverts'));
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
       $advert =  $this->advertService->returnSingleAdverts($id);
//        $advert = $this->adverts->with('city', 'category', 'user');
//dd($advert);
//        if(!$advert){
//            return redirect()->back();
//        }

        return view('adverts.single', compact('advert'));
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
