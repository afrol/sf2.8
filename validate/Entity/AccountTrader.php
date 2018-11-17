<?php

namespace Entity;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

class AccountTrader implements GroupSequenceProviderInterface
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var \stdClass
     */
    private $request;

    /**
     * AccountTrader constructor.
     * @param \stdClass|null $request
     */
    public function __construct(\stdClass $request = null)
    {
        $this->request = $request;
    }

    public function isPasswordSafe()
    {
        return ($this->email !== $this->password);
    }

    public function isCompareFullName()
    {
        if ($this->request === null) {
            return true;
        }

        return $this->fullName === $this->request->fullName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * Returns which validation groups should be used for a certain state
     * of the object.
     *
     * @return array An array of validation groups
     */
    public function getGroupSequence()
    {
        $groups = [self::class];

        if ($this->request === null) {
            $groups = ['Strict'];
        }

        return $groups;
    }
}
