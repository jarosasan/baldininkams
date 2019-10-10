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

    public function getFullAdvertsList()
    {

    }

    public function getAdvertsPaginatedList($perPage)
    {
        $columns = ['id', 'title', 'type', 'short_description', 'city_id', 'price', 'created_at', 'img', 'currency'];
        $result = $this
            ->startCondition()
            ->select($columns)
            ->where('status_id', AdvertStatus::ACTIVE)
            ->paginate($perPage);

        return $result;
    }

    public function getSingleAdvert ( $id)
    {
        $result = $this
            ->startCondition()
            ->where('status_id', AdvertStatus::ACTIVE)
            ->find($id)
            ->first();

        return $result;
    }

//    public function with($relations) {
//        if (is_string($relations)) $relations = func_get_args();
//
//        $this->with = $relations;
//
//        return $this;
//    }


}
