<?php
/**
 * Created by PhpStorm.
 * User: sbienvenu
 * Date: 03/12/2015
 * Time: 15:08
 */
namespace Tests\Entity;

use Delivery\Entity\User;

/**
 * Class Test
 * @package Tests\Entity
 */
class Test extends \PHPUnit_Framework_TestCase
{

    public function testSetNameActuallySetNameProperty()
    {
        $instance = new User();
        $name = 'Thibs';

        //call method to test
        $instance->setNom($instance);

        //assert
        $this->assertSame($instance, $instance->setNom($name));
        $this->assertAttributeSame($name, 'nom', $instance);

    }

}
