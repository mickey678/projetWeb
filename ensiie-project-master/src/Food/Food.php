<?php
namespace Food;

class Food
{
    private $Id;
    private $Name;
    private $Type;
    private $Price;
    private $Quantity;
    private $codeBarre;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setCodeBarre($codebarre)
    {
        $this->codebarre = $codebarre;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodeBarre()
    {
        return $this->codebarre;
    }






}

?>