<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TypeRepository
 * @package namespace App\Repositories;
 */
interface TypeRepository extends RepositoryInterface
{
    public function getParents();
    public function getChildren();
}
