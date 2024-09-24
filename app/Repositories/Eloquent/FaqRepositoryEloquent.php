<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\FaqRepository;
use App\Models\Faq;
//use App\Validators\FaqsValidator;

/**
 * Class FaqsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FaqRepositoryEloquent extends BaseRepository implements FaqRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Faq::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
