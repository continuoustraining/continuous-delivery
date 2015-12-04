<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 03/12/15
 * Time: 15:04
 */

namespace DeliveryTest\Entity;
use Delivery\Entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testSetNameActuallySetNameProperty()
    {
        $instance = new User();
        $name = 'toto';
        
        $this->assertSame($instance, $instance->setName($name));
        $this->assertAttributeSame($name, 'name', $instance);
    }
}
