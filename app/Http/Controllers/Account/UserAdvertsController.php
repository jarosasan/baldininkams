<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\BaseController;
use App\Models\Advert;
use App\Repositories\AdvertRepository;
use Illuminate\Http\Request;
use App\Services\AdvertService;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserAdvertsController
 * @package App\Http\Controllers\Account
 */
class UserAdvertsController extends BaseController
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
     * @params $user
     * @params $pagination
     * @return \Illuminate\Http\Response
     */
    public function index($paginate = 3)
    {
        $user = Auth::user();
        $adverts = $this->advertService->returnUserListOfAdverts($user->getAuthIdentifier(), $paginate);

        return view('user-account.user_adverts_list', compact('adverts'));
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
        return view('adverts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', Advert::class);
        $this->adverts->create($request->all());
        return redirect()->route('user.ads');

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

        return view('adverts.single', compact('advert'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Advert $advert)
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
