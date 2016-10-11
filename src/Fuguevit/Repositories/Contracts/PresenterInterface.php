<?php

namespace Fuguevit\Repositories\Contracts;

/**
 * Interface PresenterInterface
 * @package Fuguevit\Repositories\Contracts
 */
interface PresenterInterface
{
    /**
     * Prepare a new or cached presenter instance
     *
     * @return mixed
     */
    public function present();

}