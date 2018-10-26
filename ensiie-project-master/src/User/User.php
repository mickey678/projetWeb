<?php
namespace User;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var \username
     */
    private $username;

    private $passwordd;
      /**
     * @var \mail
     */
    private $mail;
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return \username
     */
    public function getUsername() //: \DateTimeInterface
    {
        return $this->username;
    }

    /**
     * @param \DateTimeInterface $birthday
     * @return User
     */
    public function setUsername( $username)
    {
        $this->username = $username;
        return $this;
    }


    /**
     * @return int
     * @throws \OutOfRangeException
     */
    public function getMail()
    {
        return $this->mail;
    }
    
    public function setMail($mail)
    {
        return $this->mail = $mail;
    }
    public function getPassword()
    {
        return $this->passwordd;
    }
    
    public function setPassword($password)
    {
        return $this->passwordd = $password;
    }



}

