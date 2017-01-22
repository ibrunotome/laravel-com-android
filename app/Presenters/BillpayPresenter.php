<?php

namespace SON\Presenters;

use SON\Transformers\BillpayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillpayPresenter
 *
 * @package namespace SON\Presenters;
 */
class BillpayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillpayTransformer();
    }
}
