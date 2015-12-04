<?php
/**
 * Created by PhpStorm.
 * User: sbienvenu
 * Date: 03/12/2015
 * Time: 16:10
 */

namespace Delivery\Service;


class User
{
    /**
     * @var \Delivery\Cache\CacheInterface
     */
    protected $cache;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $repository;

    /**
     * @return \Delivery\Cache\CacheInterface
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param \Delivery\Cache\CacheInterface $cache
     * @return User
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param \Doctrine\ORM\EntityRepository $repository
     * @return User
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
        return $this;
    }

    /**
     * @param $id
     * @return null
     */
    public function findUser($id)
    {
        if ($this->cache->has($id)) {
            return $this->cache->get($id);
        } else {
            return $this->repository->find($id);
        }
    }

}