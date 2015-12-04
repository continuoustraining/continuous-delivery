<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 03/12/15
 * Time: 16:11
 */

namespace DeliveryTest\Service;

use Delivery\Entity\User as UserEntity;
use Delivery\Service\User as UserService;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testFindUserReturnUserFromCacheIfExists()
    {
        $user = new UserEntity();
        $id = 123;
        $service = new UserService();
        $cache = $this->getMock('Delivery\Cache\CacheInterface');
        $service->setCache($cache);
        
        $cache->expects($this->once())
            ->method('has')
            ->with($id)
            ->willReturn(true);
        
        $cache->expects($this->once())
            ->method('get')
            ->with($id)
            ->willReturn($user);
        
        $this->assertSame($user, $service->findUser($id));
    }
    
    public function testFindUserReturnUserFromDbIfNotExistsInCache()
    {
        // fixtures
        $user = new UserEntity();
        $id = 123;
        $service = new UserService();
        
        // mocks
        $cache = $this->getMock('Delivery\Cache\CacheInterface');
        $repository = $this->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();
        
        // dependency injection
        $service->setCache($cache);
        $service->setRepository($repository);
        
        // tests
        $cache->expects($this->once())
            ->method('has')
            ->with($id)
            ->willReturn(false);
        
        $repository->expects($this->once())
            ->method('find')
            ->with($id)
            ->willReturn($user);
        
        $this->assertSame($user, $service->findUser($id));
    }
}
