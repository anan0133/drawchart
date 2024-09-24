<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ChartRepository;
use App\Models\Chart;


/**
 * Class ChartRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ChartRepositoryEloquent extends BaseRepository implements ChartRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chart::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getListCollec()
    {
        return Chart::where('display_collect', 1)
        	->orderBy('created_at', 'desc')
            ->get();
    }

    public function getListSlide()
    {
        return Chart::where('display_slide', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
