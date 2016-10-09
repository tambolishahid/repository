<?php

namespace Fuguevit\Repositories\Creiteria;

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