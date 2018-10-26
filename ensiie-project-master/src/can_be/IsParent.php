<?php
namespace IsParent;
class IsParent{
    private $id;
    private $idParent;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;
        return $this;
    }

    public function getidParent()
    {
        return $this->idParent;
    }

}