<?php

namespace Projeto\GaleriaDeFotos\App\Model\UserModal;

class User
{

    private $id;
    private $email;
    private $pass;

    public function __construct($id, $email, $pass)
    {
        $this->id = $id;
        $this->email = $email;
        $this->pass = $pass;
    }


    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

 
    public function getPass()
    {
        return $this->pass;
    }
 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

}