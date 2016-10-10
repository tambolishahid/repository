<?php

namespace Fuguevit\Repositories\Criteria;

use Fuguevit\Repositories\Contracts\Repository;

abstract class Criteria
{
    /**
     * @param model
     * @param Repository $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}