<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\TypeRepository;
use App\Models\Type;


/**
 * Class TopicRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TypeRepositoryEloquent extends BaseRepository implements TypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Type::class;
    }

    public function getParents()
    {
        return Type::whereNull('parent_id')
            ->get();
    }
    public function getChildren()
    {
        return Type::whereNotNull('parent_id')
            ->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
