<?php

namespace Delivery\Cache;

/**
 * Created by PhpStorm.
 * User: fred
 * Date: 03/12/15
 * Time: 16:32
 */
interface CacheInterface
{
    /**
     * @param scalar $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param scalar $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param scalar $key
     * @return mixed
     */
    public function has($key);
}