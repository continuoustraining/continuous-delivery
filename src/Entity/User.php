<?php
/**
 * Created by PhpStorm.
 * User: sbienvenu
 * Date: 03/12/2015
 * Time: 15:17
 */

namespace Delivery\Entity;


class User
{
    /**
     * @var
     */
    private $nom;


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }



}