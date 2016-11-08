<?php

namespace Fuguevit\Repositories\Tests\Models\Criteria;

use Fuguevit\Repositories\Criteria\Criteria;
use Fuguevit\Repositories\Contracts\RepositoryInterface as Repository;

class BodyContainsHello extends Criteria
{
    /**
     * {@inheritdoc}
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('body', 'LIKE', '%hello%');
        return $model;
    }
}