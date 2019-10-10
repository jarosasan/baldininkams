<?php

namespace App\Repositories;

use App\Models\Category as Model;
use Debugbar;


/*
 * Class CategoryRepository
 *
 * @package App\Repositories
 */

class CategoryRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return mixed
     */
    public function getAllForList()
    {
        $columns = ['id', 'category_name', 'parent_id'];
        $result = $this
            ->startCondition($columns)
            ->select()
            ->get();
        return $result;
    }


}
