<?php
/**
 * Created by PhpStorm.
 * User: sbienvenu
 * Date: 03/12/2015
 * Time: 16:12
 */

namespace Tests\Service;


use Delivery\Entity\User;
use Delivery\Service\User as Service;
use Symfony\Component\VarDumper\VarDumper;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testFindUserReturnUserFromCacheIfExists()
    {
        $user = new User();
        $service = new Service();
        $id = 123;

        $cache = $this->getMock('Delivery\Cache\CacheInterface');
        $service->setCache($cache);

        $cache->expects($this->once())
            ->method('get')
            ->with($id)
            ->willReturn($user);

        $cache->expects($this->once())
            ->method('has')
            ->with($id)
            ->willReturn(true);

        $this->assertSame($user, $service->findUser($id));

    }


    public function testFindUserReturnUserFromDbIfNotExistsInCache()
    {
        //fixtures
        $user = new User();
        $service = new Service();
        $id = 123;
        $repository = $this
            ->getMockBuilder('Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $cache = $this->getMock('Delivery\Cache\CacheInterface');

        //dependencies injection
        $service->setCache($cache);
        $service->setRepository($repository);

        //tests
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
