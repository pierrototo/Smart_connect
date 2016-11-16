<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="button")
 */
class Button
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $button_product;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $button_price;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $alert;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $asin;

    public function getId() {
    	return $this->id;
    }

    public function getName() {
    	return $this->name;
    }

    public function setName($_name) {
    	$this->name = $_name;
    }

    public function getButtonProduct() {
    	return $this->button_product;
    }

    public function setButtonProduct($buttonproduct) {
    	$this->button_product = $buttonproduct;
    }

    public function getButtonPrice() {
    	return $this->button_price;
    }

    public function setButtonPrice($buttonprice) {
    	$this->button_price = $buttonprice;
    }

    public function getAlert() {
    	return $this->alert;
    }

    public function setAlert($_alert) {
    	$this->alert = $_alert;
    }

    public function getAsin() {
    	return $this->asin;
    }

    public function setAsin($_asin) {
    	$this->asin = $_asin;
    }


    public function __construct($name,$buttonproduct,$buttonprice,$alert,$asin)
    {
        $this->setName($name);
        $this->setButtonProduct($buttonproduct);
        $this->setButtonPrice($buttonprice);
        $this->setAlert($alert);
        $this->setAsin($asin);
    }

}