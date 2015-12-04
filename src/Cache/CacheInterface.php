<?php
/**
 * Created by PhpStorm.
 * User: sbienvenu
 * Date: 03/12/2015
 * Time: 16:29
 */
namespace Delivery\Cache;

/**
 * Interface CacheInterface
 * @package Delivery\Cache
 */
interface CacheInterface
{
    /**
     * @param integer $key
     * @return mixed
     */
    public function get($key);


    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param integer $key
     * @return mixed
     */
    public function has($key);

}