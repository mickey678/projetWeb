<?php
namespace User\Hydrator;

include_once '../../../src/User/Entity/User.php';
class User{

    public function extract(\User\Entity\User $userObject):array {
        $data = [];
        if($userObject->getID()){
            $data["id"]=$userObject->getId();
        }
        if($userObject->getName()){
            $data["name"] = $userObject->getName();
        }
        if($userObject->getPassword()){
            $data["password"]=$userObject->getPassword();
        }
        if($userObject->getlastName()){
            $data["lastname"] = $userObject->getlastName();
        }
        if($userObject->getUsername()){
            $data["username"] = $userObject->getUsername();
        }
        if($userObject->getMail()){
            $data["mail"] = $userObject->getMail();
        }
        return $data;
    }
    public function hydrate(array $data, \User\Entity\User $emptyEntity):\User\Entity\User{
        $emptyEntity->setId($data["id"]?? null);
        $emptyEntity->setName($data["name"]?? null);
        $emptyEntity->setPassword($data["password"] ?? null);
        $emptyEntity->setUsername($data["lastname"] ?? null);
        $emptyEntity->setMail($data["username"] ?? null);
        $emptyEntity->setlastName($data["mail"] ?? null);
        return $emptyEntity;
    }
}



?>