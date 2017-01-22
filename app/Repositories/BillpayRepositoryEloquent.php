<?php

namespace SON\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use SON\Entities\Billpay;

/**
 * Class BillpayRepositoryEloquent
 *
 * @package namespace SON\Repositories;
 */
class BillpayRepositoryEloquent extends BaseRepository implements BillpayRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Billpay::class;
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
        Billpay::clearBootedModels();
    }
}
