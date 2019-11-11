<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Advert;
use App\Models\City;
use App\Models\User;
use App\Repositories\AdvertRepository;
use App\Http\Requests\StoreAdvertRequest;
use App\Services\AdvertService;
use Illuminate\Support\Facades\Auth;

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
    public function index($paginate = 10)
    {
        $adverts = $this->advertService->returnListOfAdverts($paginate);

        return view('adverts.adverts_list', compact('adverts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\AdvertService
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert =  $this->advertService->returnSingleAdverts($id);

        return view('adverts.single', compact('advert'));
    }

    /**
     * Display a listing of the resource.
     * @params $user
     * @params $pagination
     * @return \Illuminate\Http\Response
     */
    public function getUserAdverts($paginate = 10)
    {
        $user = Auth::user();
        $adverts = $this->advertService->returnUserListOfAdverts($user->getAuthIdentifier(), $paginate);
        return view('adverts.user_adverts_list', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Advert::class);
        $cities = City::all();
        $categories = Category::all();
        return view('adverts.create', compact('cities', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Advert $ad
     * @param \App\Http\Requests\StoreAdvertRequest $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreAdvertRequest $request, Advert $ad)
    {
        $this->authorize('create', Advert::class);
        $this->adverts->create($request, Auth::id());
//        $ad->create($request->except('img', '_token') + ['user_id'=>Auth::id()]);

//       $ads->addMediaFromRequest('img')->preservingOriginal()->toMediaCollection('images');

//        $this->adverts->create($request, Auth::id());
//        if($request->hasFile('img')){
////dd($request->img, '====', $request->file());
//            $this->adverts->addMediaFromRequest('img')->preservingOriginal()->toMediaCollection('images');
////            dd($advert->getMedia('images'));
////            $advert->addMedia($request->file('img'))->toMediaCollection();
//        }

//        return redirect()->route('user.adverts');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param  \App\Models\Advert $advert
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @params \App\Repositories\AdvertRepository
     */
    public function edit($id, Advert $advert)
    {
        $this->authorize('update', $advert);

        $advert = $this->adverts->getAdvertToUpdate($id);
        return view('advert.form', compact('advert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   \App\Http\Requests\StoreAdvertRequest $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(StoreAdvertRequest $request, Advert $advert)
    {
        $this->authorize('update', $advert);
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
