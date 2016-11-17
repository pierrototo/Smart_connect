<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
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
     * @ORM\Column(type="date")
     */
    protected $birthdate;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $civility;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $token_zinc;

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

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTime $date = null)
    {
        $this->birthdate = $date;
    }

    public function getCivility()
    {
        return $this->civility;
    }

    public function setCivility($civility)
    {
        $this->civility = $civility;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phonenumber)
    {
        $this->phone_number = $phonenumber;
    }

    public function getTokenZinc()
    {
        return $this->token_zinc;
    }

    public function setTokenZinc($tokenzinc)
    {
        $this->token_zinc = $tokenzinc;
    }

    public function __construct()
    {
        parent::__construct();
        $this->addRole('ROLE_ADMIN');
        // your own logic
    }
}