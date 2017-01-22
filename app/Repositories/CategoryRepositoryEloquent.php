<?php

namespace SON\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use SON\Entities\Category;

/**
 * Class CategoryRepositoryEloquent
 *
 * @package namespace SON\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function applyMultitenancy()
    {
        Category::clearBootedModels();
    }
}
