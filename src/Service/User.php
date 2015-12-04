<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 03/12/15
 * Time: 16:09
 */

namespace Delivery\Service;

use Delivery\Cache\CacheInterface;
use Doctrine\ORM\EntityRepository;

class User
{
    /**
     * @var EntityRepository
     */
    protected $repository;
    
    /**
     * @var |Delivery\Cache\CacheInterface
     */
    protected $cache;

    /**
     * @param mixed $cache
     * @return $this
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }
    
    /**
     * @param mixed $repository
     * @return User
     */
    public function setRepository(EntityRepository $repository)
    {
        $this->repository = $repository;
        return $this;
    }
    
    /**
     * @param $id
     * @return \Delivery\Entity\User
     */
    public function findUser($id)
    {
        if ($this->cache->has($id)) {
            $entity = $this->cache->get($id);
        } else {
            $entity = $this->repository->find($id);
        }
        
        return $entity;
    }
}