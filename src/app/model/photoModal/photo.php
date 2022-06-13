<?php

namespace Projeto\GaleriaDeFotos\App\Model\PhotoModal;

class Photo
{

    private $id;
    private $path;
    private $name;

    public function __construct($id, $path, $name)
    {
        $this->id = $id;
        $this->path = $path;
        $this->name = $name;
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

    
    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
}