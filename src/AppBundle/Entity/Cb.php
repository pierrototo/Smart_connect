<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use VMelnik\DoctrineEncryptBundle\Configuration\Encrypted;

/**
 * @ORM\Entity
 * @ORM\Table(name="cb")
 */
class Cb
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min=16,
     *     max=16,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Encrypted
     */
    protected $carte_number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min=3,
     *     max=3,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Encrypted
     */
    protected $cvc;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min=2,
     *     max=2,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Assert\NotBlank()
     */
    protected $month;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min=2,
     *     max=2,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $year;

    /**
     * Gets the first name
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the first name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($firstname)
    {
        $this->first_name = $firstname;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($lastname)
    {
        $this->last_name = $lastname;
    }

    public function getCarteNumber()
    {
        return $this->carte_number;
    }

    public function setCarteNumber($cartenumber)
    {
        $this->carte_number = $cartenumber;
    }

    public function getCvc()
    {
        return $this->cvc;
    }

    public function setCvc($_cvc)
    {
        $this->cvc = $_cvc;
    }

    /*public function getPlainCvc()
    {
        return $this->plain_cvc;
    }

    public function setPlainCvc($_plain_cvc)
    {
        $this->plain_cvc = $_plain_cvc;
    }*/

    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth($_month)
    {
        $this->month = $_month;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($_year)
    {
        $this->year = $_year;
    }
}