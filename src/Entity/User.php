<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 03/12/15
 * Time: 15:29
 */

namespace Delivery\Entity;


class User
{
    protected $name;

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
}