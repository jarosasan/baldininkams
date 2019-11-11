<?php


namespace App\Repositories;


use App\Models\Advert as Model;
use App\Models\AdvertStatus;
use App\Repositories\Interfaces\AdvertRepositoryInterface;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AdvertRepository extends CoreRepository implements AdvertRepositoryInterface
{
//    use DatabaseTransactions;

    /*
     * @var Model
     */
    protected $model;

    /*
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }


    public function getAdvertsPaginatedList($perPage)
    {
        $columns = ['id', 'title', 'type', 'short_description', 'price', 'created_at', 'img', 'currency', 'city_id'];
        $result = $this
            ->startCondition()
            ->select($columns)
            ->where('status_id', AdvertStatus::ACTIVE)
            ->with('city')
            ->paginate($perPage);

        return $result;
    }

    public function getSingleAdvert ($id)
    {
        $result = $this
            ->startCondition()
            ->where('status_id', AdvertStatus::ACTIVE)
            ->find($id)
            ->first();

        return $result;
    }

    public function getUserActiveAdvertsPaginatedList($user, $perPage)
    {
        $columns = ['id', 'title', 'type', 'price', 'img', 'currency', 'active_to'];
        $result = $this
            ->startCondition()
            ->select($columns)
            ->where('user_id', $user)
            ->where('status_id', AdvertStatus::ACTIVE)
            ->paginate($perPage);
        return $result;
    }

    public function getUserInactiveAdvertsPaginatedList($user, $perPage)
    {
        $columns = ['id', 'title', 'type', 'price', 'img', 'currency'];
        $result = $this
            ->startCondition()
            ->select($columns)
            ->where('user_id', $user)
            ->where('status_id', AdvertStatus::INACTIVE)
            ->paginate($perPage);

        return $result;
    }


    public function getAdvertToUpdate($id)
    {
        $result = $this
            ->startCondition()
            ->where('status_id', AdvertStatus::ACTIVE)
            ->with('city')
            ->with('category')
            ->find($id)
            ->first();

        return $result;

    }

    public function create($request, $user_id)
    {
        $advert = $this->startCondition();
       $ad = $advert->create($request->except('img', '_token') + ['user_id'=>$user_id]);
        if($request->hasFile('img')){
//            $ad->addMediaFromRequest('img')->preservingOriginal()->toMediaCollection('images');

            $fileAdders = $ad
                ->addMultipleMediaFromRequest(['img'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }
       return ;
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
