<?php

namespace Fuguevit\Repositories\Contracts;

interface CacheInterface
{
    /**
     * Set ttl.
     *
     * @param $minutes
     */
    public function setTtl($minutes);

    /**
     * Set cacheable or not.
     *
     * @param $bool
     */
    public function setEnabled($bool);
}
